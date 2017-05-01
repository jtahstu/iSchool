<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Course;
use App\Detail;
use DB;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Tool::getLevel()==1){
            Tool::writeLog(Tool::get_user_name().' 登录了后台');
            return view('admin.index');
        }else{
            return view('index.404');
        }

    }

    public function course()
    {
        $course_all = Course::getCourseAll();
        return view('admin.course',['course_all'=>$course_all]);
    }

    public function setting()
    {
        if(Tool::isLogin()){
            $user = User::where('id',Tool::get_user_id())->first();
            return view('admin.setting',['user'=>$user]);
        }else{
            return view('index.404');
        }

    }

    public function courseEdit($id)
    {
        $course = Course::where('id',$id)->first()->toArray();
        return view('admin.course-edit',['course'=>$course]);
    }

    public function courseEditDo(Request $request)
    {
        $data = $request->input();
        $id = $request->input('id');
        $file = $request->file('file');
        if ($file && $file->isValid()) {
            $clientName = $file -> getClientOriginalName();
            $entension = $file -> getClientOriginalExtension();
            $newName = md5(date("Y-m-d H:i:s").$clientName).".".$entension;
            $data['logo'] = $file -> move('public/img/logo',$newName);
        }
        unset($data['_token']);
        unset($data['id']);
        $res = DB::table('courses')
            ->where('id',$id)
            ->update($data);
        if($res)
            return Tool::returnMsg($res,'课程编辑成功！');
        else
            return Tool::returnMsg($res,'课程编辑失败！');
    }

    public function courseAdd()
    {
        return view('admin.course-add');
    }

    public function courseAddDo(Request $request)
    {
        $data = $request->input();
        $id = $request->input('id');
        $file = $request->file('file');
        if ($file && $file->isValid()) {
            $clientName = $file -> getClientOriginalName();
            $entension = $file -> getClientOriginalExtension();
            $newName = md5(date("Y-m-d H:i:s").$clientName).".".$entension;
            $data['logo'] = $file -> move('public/img/logo',$newName);
        }
        unset($data['_token']);
        unset($data['id']);
        $res = DB::table('courses')
            ->where('id',$id)
            ->insert($data);
        if($res)
            return Tool::returnMsg($res,'教程添加成功！');
        else
            return Tool::returnMsg($res,'教程添加失败！');
    }

    public function courseDelDo(Request $request)
    {
        $id = $request->input('id');
        $log = Tool::get_user_name().' 删除了一个课程，课程内容为：'.json_encode(Course::where('id',$id)->get()->toArray());
        $res = Course::where('id',$id)->delete();
        $log2 = '顺带删除了'.json_encode(Detail::where('course_id',$id)->get()->toArray());
        $res2 = Detail::where('course_id',$id)->delete();
        if($res){
            Tool::writeLog($log);
            Tool::writeLog($log2);
            return Tool::returnMsg($res,'教程删除成功');
        }else{
            return Tool::returnMsg($res,'教程删除失败');
        }
    }

    public function courseWareEdit($id){
        $detail = Detail::where('id',$id)->first();
        return view('admin.course-ware-edit',['detail'=>$detail]);
    }

    public function courseWareEditDo(Request $request)
    {
        $data = $request->input();
        $id = $data['id'];
        unset($data['id']);
        unset($data['_token']);
        $data['content']=html_entity_decode($data['content']);
        $res = DB::table('details')
            ->where('id',$id)
            ->update($data);
        if($res){
            return Tool::returnMsg($res,'课件编辑成功!');
        }else{
            return Tool::returnMsg($res,'课件编辑失败!');
        }
    }

    public function courseWareAdd($id)
    {
        return view('admin.course-ware-add',['course_id'=>$id]);
    }

    public function courseWareAddDo(Request $request)
    {
        $data = $request->input();
        if(empty($data['course_id'])||empty($data['title'])||empty($data['content'])){
            return Tool::returnMsg(0,'课件标题和课件内容为必填');
        }

        $detail = new Detail();
        $detail->course_id = $data['course_id'];
        $detail->title = $data['title'];
        $detail->url = $data['url']?$data['url']:$data['title'];
        $detail->view = intval($data['view'])?intval($data['view']):1;
        $detail->content = $data['content'];

        $res = $detail->save();
        if($res){
            return Tool::returnMsg(1,'课件添加成功!');
        }else{
            return Tool::returnMsg(0,'课件添加失败!');
        }
    }

    public function courseWareDelDo(Request $request)
    {
        $id = $request->input('id');
        $log = Tool::get_user_name().' 删除了一个课件，课件内容为：'.json_encode(Detail::where('id',$id)->get()->toArray());
        $res = Detail::where('id',$id)->delete();
        if($res){
            Tool::writeLog($log);
            return Tool::returnMsg($res,'课件删除成功');
        }else{
            return Tool::returnMsg($res,'课件删除失败');
        }
    }

    public function gitAdd()
    {
        return view('admin.git-add');
    }

    public function comment()
    {
//        $comments = DB::select('select a.*,b.title,c.name from ischool_comments a left join ischool_details b on a.ref_id=b.id
//left join ischool_courses c on b.course_id=c.id')->get()->paginate(20);
        $comments = DB::table('comments')->join('users', 'users.id', '=', 'comments.add_user_id')->paginate(20);
        return view('admin.comment', ['comments' => $comments]);
    }

    public function courseCommentDelDo(Request $request)
    {
        $id = $request->input('id');
        $log = Tool::get_user_name().' 删除了一条评论，评论内容为：'.json_encode(Comment::where('id',$id)->get()->toArray());
        $res = Comment::where('id',$id)->delete();
        if($res){
            Tool::writeLog($log);
            return Tool::returnMsg($res,'评论删除成功');
        }else{
            return Tool::returnMsg($res,'评论删除失败');
        }
    }

    public function userEditDo(Request $request)
    {
        $id = Tool::get_user_id();
        $data['name']=$request->input('name');
        $data['gender']=$request->input('gender');
        $data['school']=$request->input('school');
        $data['address']=$request->input('address');
        $data['company']=$request->input('company');
        $file = $request->file('file');
        if ($file && $file->isValid()) {
            $clientName = $file -> getClientOriginalName();
            $entension = $file -> getClientOriginalExtension();
            $newName = md5(date("Y-m-d H:i:s").$clientName).".".$entension;
            $data['head_pic'] = $file -> move('public/img/tx',$newName);
        }
        $res = DB::table('users')
            ->where('id',$id)
            ->update($data);
        if($res){
            return Tool::returnMsg($res,'个人信息编辑成功!');
        }else{
            return Tool::returnMsg($res,'个人信息编辑失败!');
        }
    }
}
