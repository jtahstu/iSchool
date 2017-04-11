<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Course;
use App\Detail;
use DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(in_array(\Auth::user()->name,['root','jtahstu'])){
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

    public function courseEdit(){

    }

    public function courseAdd(){

    }

    public function courseDel(){

    }

    public function courseWareEdit(){

    }

    public function courseWareAdd(){

    }

    public function courseWareDel(){

    }
}
