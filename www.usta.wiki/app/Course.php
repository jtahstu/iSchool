<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Course extends Model
{
    public static function getCourseAll()
    {
        $courses = Course::all()->sortBy('sort')->toArray();
        foreach ($courses as $key=>$course){
            $wares = Detail::where('course_id',$course['id'])->get(['id','title','url','view'])->toArray();
            $courses[$key]['wares'] = $wares;
        }
        return  $courses;
    }
}
