<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Course extends Model
{
    public static function getCourseAll()
    {
//        $courses = DB::select('select a.*,b.title,b.url,b.course_id from ischool_courses a left join ischool_details b on a.id=b.course_id');
        $courses = Course::all()->toArray();
//        exit(var_dump($courses));
        foreach ($courses as $key=>$course){
            $wares = Detail::where('course_id',$course['id'])->get(['title','url'])->toArray();
            $courses[$key]['wares'] = $wares;
        }
//        exit(var_dump($courses));
        return  $courses;
    }
}
