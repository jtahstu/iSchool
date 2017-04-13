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
            return Tool::returnMsg($res,'添加成功！');
        else
            return Tool::returnMsg($res,'添加失败！');
    }

    public function courseDel($id)
    {

    }

    public function courseWareEdit(){

    }

    public function courseWareAdd(){

    }

    public function courseWareDel(){

    }
}
