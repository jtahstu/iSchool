<?php

namespace App\Http\Controllers;

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
        return view('admin.setting');
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
            return Tool::returnMsg($res,'编辑成功！');
        else
            return Tool::returnMsg($res,'编辑失败！');
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
        $res = Course::where('id',$id)->delete();
        if($res){
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
        $data['content'] = htmlspecialchars($data['content']);
        $res = DB::table('details')
            ->where('id',$id)
            ->update($data);
        if($res){
            return Tool::returnMsg($res,'课件编辑成功!');
        }else{
            return Tool::returnMsg($res,'课件编辑失败!');
        }
    }

    public function courseWareAdd(){

    }

    public function courseWareDelDo(Request $request)
    {
        $id = $request->input('id');
        $res = Course::where('id',$id)->delete();
        if($res){
            return Tool::returnMsg($res,'课件删除成功');
        }else{
            return Tool::returnMsg($res,'课件删除失败');
        }
    }
}
