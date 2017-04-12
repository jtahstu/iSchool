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
        if(in_array(Tool::get_user_id(),[1,2,3,4,5])){
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
//        exit(var_dump($course));
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
        echo $res;
    }

    public function courseAdd()
    {

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
