<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Detail;
use App\Course;
use Illuminate\Support\Facades\Input;

class CourseController extends Controller
{
    public function show()
    {
        $type = Input::get('course');
        $ware = Input::get('ware');

        $course = Course::where('url',$type)->get()[0];
        $nav_lis = Detail::where('course_id',$course['id'])->get()->toArray();

        $link_ware = ['pre_course'=>['title'=>'','url'=>''],'next_course'=>['title'=>'','url'=>'']];

        if($ware){
            $detail = Detail::where(['course_id'=>$course['id'],'url'=>$ware])->get()[0]->toArray();
        }else{
            $detail = Detail::where(['course_id'=>$course['id']])->get()[0]->toArray();
        }

        $pre_id = Detail::where('id','<',$detail['id'])->where('course_id',$course['id'])->max('id');
        $next_id = Detail::where('id','>',$detail['id'])->where('course_id',$course['id'])->min('id');
        if($pre_id){
            $link_ware['pre_course'] = Detail::where('id',$pre_id)->get(['title','url'])[0];
        }
        if($next_id){
            $link_ware['next_course'] = Detail::where('id',$next_id)->get(['title','url'])[0];
        }

        return view('course.show',['course'=>$course,'nav_lis'=>$nav_lis,'detail'=>$detail,'link_ware'=>$link_ware]);
    }

    public function search()
    {
        $words = Input::get('top-search');

        $courses = Course::all();

        return view('index.search',['courses'=>$courses,'words'=>$words]);
    }
}
