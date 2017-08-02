<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Config;
use App\Git;
use App\Like;
use App\Note;
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
        unset($data['s']);  //看后面的注释
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
        $data['add_user_id'] = Tool::get_user_id();
        $data['created_at'] = Tool::getDateTime();
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

        //这里由于服务器迁移，由原来的Apache移至Nginx下，添加了个重写规则，导致读入的参数多了方法名，在插入数据库时产生错误
        //产生了这么个奇葩的特定条件下的错误，Apache下不会产生这个问题，或者把这个代码改成一个一个接收也可以
        //先这么弄吧
        //by jtahstu at 2017/08/02 16:30
        unset($data['s']);

        $res = DB::table('courses')
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
        $res = DB::table('courses')
            ->where('id',$id)
            ->update(array('is_delete'=>1));
        $log2 = '顺带删除了课件表 '.json_encode(Detail::where('course_id',$id)->get()->toArray());
        $res2 = DB::table('details')
            ->where('course_id',$id)
            ->update(array('is_delete'=>1));
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
        if(Detail::checkUrl($data['course_id'],$data['url'])){
            return Tool::returnMsg(0,'该课程链接已存在！');
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

    public function git()
    {
        $gits = Git::all()->sortByDesc('id');
        return view('admin.git',['gits'=>$gits]);
    }

    public function gitAddDo(Request $request)
    {
        if(empty($request->input('content'))||empty($request->input('version'))){
            return Tool::returnMsg(0,'content and version is required !');
        }

        $git = new Git();
        $git->content = $request->input('content');
        $git->version = $request->input('version');
        $res = $git->save();
        if($res){
            return Tool::returnMsg($res,'Git添加成功');
        }else{
            return Tool::returnMsg($res,'Git添加失败');
        }

    }

    public function comment()
    {
//        $comments = DB::select('select a.*,b.title,c.name from ischool_comments a left join ischool_details b on a.ref_id=b.id
//left join ischool_courses c on b.course_id=c.id')->get()->paginate(20);
        $comments = DB::table('comments')->paginate(20);
        return view('admin.comment', ['comments' => $comments]);
    }

    public function note()
    {
        $notes = DB::table('notes')->paginate(20);
        return view('admin.note',['notes'=>$notes]);
    }

    public function courseCommentDelDo(Request $request)
    {
        $id = $request->input('id');
        $log = Tool::get_user_name().' 删除了一条评论，评论内容为：'.json_encode(Comment::where('id',$id)->get()->toArray());
        $res = Comment::where('id',$id)->delete();
        $log2 = '顺带删除了点赞表 '.json_encode(Like::where('type',1)->where('ref_id',$id)->get()->toArray(), JSON_UNESCAPED_UNICODE);
        $res2 = Like::where('type',1)->where('ref_id',$id)->delete();
        if($res){
            Tool::writeLog($log);
            Tool::writeLog($log2);
            return Tool::returnMsg($res,'评论删除成功');
        }else{
            return Tool::returnMsg($res,'评论删除失败');
        }
    }

    public function userEditDo(Request $request)
    {
        $id = $request->input('id');
        $data['name']=$request->input('name');
        $data['gender']=$request->input('gender');
        $data['school']=$request->input('school');
        $data['address']=$request->input('address');
        $data['company']=$request->input('company');
        $data['signature']=$request->input('signature');
        $file = $request->file('file');
        if ($file && $file->isValid()) {
            $clientName = $file -> getClientOriginalName();
            $entension = $file -> getClientOriginalExtension();
            $newName = md5(date("Y-m-d H:i:s").$clientName).".".$entension;
            $data['head_pic'] = $file -> move('public/img/tx',$newName);
        }
        $user = User::where('id',$id)->first()->toArray();
        $log = Tool::get_user_name().' 修改了用户信息，原信息为'.\GuzzleHttp\json_encode($user).' ,修改为 '.\GuzzleHttp\json_encode($data);
        $res = DB::table('users')
            ->where('id',$id)
            ->update($data);
        if($res){
            Tool::writeLog($log);
            return Tool::returnMsg($res,'个人信息编辑成功!');
        }else{
            return Tool::returnMsg($res,'个人信息编辑失败!');
        }
    }

    public function courseNoteDelDo(Request $request)
    {
        $id = $request->input('id');
        if(!$id){
            return Tool::returnMsg(0,'id is required !');
        }
        $log = Tool::get_user_name().' 删除了一条笔记，笔记内容为：'.json_encode(Note::where('id',$id)->get()->toArray());
        $res = Note::where('id',$id)->delete();
        $log2 = '顺带删除了点赞表 '.json_encode(Like::where('type',3)->where('ref_id',$id)->get()->toArray(), JSON_UNESCAPED_UNICODE);
        $res2 = Like::where('type',3)->where('ref_id',$id)->delete();
        if($res){
            Tool::writeLog($log);
            Tool::writeLog($log2);
            return Tool::returnMsg($res,'笔记删除成功');
        }else{
            return Tool::returnMsg($res,'笔记删除失败');
        }
    }

    public function set()
    {
        $sets = Config::all()->toArray();

        return view('admin.set',['sets'=>$sets]);
    }

    public function configAddDo(Request $request)
    {
        if(empty($request->input('name'))||empty($request->input('value'))){
            return Tool::returnMsg(0,'name and value is required !');
        }

        $config = new Config();
        $config->type = $request->input('type');
        $config->name = $request->input('name');
        $config->value = $request->input('value');
        $config->des = $request->input('des');

        $res = $config->save();
        if($res){
            return Tool::returnMsg(1,'配置添加成功!');
        }else{
            return Tool::returnMsg(0,'配置添加失败!');
        }
    }

    public function configGetOne(Request $request)
    {
        $name = $request->input('name');
        if(empty($name)){
            return Tool::returnMsg(0,'name is required !');
        }
        return  Tool::returnMsg(1,Config::getConfigRow($name));
    }

    public function configEditDo(Request $request)
    {
        $id = intval($request->input('id'));
        $data['type'] = $request->input('type');
        $data['name'] = $request->input('name');
        $data['value'] = $request->input('value');
        $data['des'] = $request->input('des');
        $config = Config::where('id',$id)->first()->toArray();
        $res = DB::table('configs')->where('id',$id)->update($data);
        $log = Tool::get_user_name().' 修改了配置,原配置为 '.\GuzzleHttp\json_encode($config).' 修改为 '.\GuzzleHttp\json_encode($data);
        if($res){
            Tool::writeLog($log);
            return Tool::returnMsg(1,'配置编辑成功!');
        }else{
            return Tool::returnMsg(0,'配置编辑失败!');
        }
    }

    public function user()
    {
        $users = DB::table('users')->paginate(20);
        return view('admin.user',['users'=>$users]);
    }

    public function problem()
    {
        $problems = DB::table('problems')->paginate(20);
        return view('admin.problem',['problems'=>$problems]);
    }
}
