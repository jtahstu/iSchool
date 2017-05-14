<?php

namespace App;

use App\Http\Controllers\Tool;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Config;

class Course extends Model
{
    /**
     * @return mixed
     */
    public static function getCourseAll()
    {
        $courses = Course::all()->where('is_delete',0)->sortBy('sort')->toArray();
        foreach ($courses as $key=>$course){
            $wares = Detail::where('course_id',$course['id'])->where('is_delete',0)->get(['id','title','url','view'])->toArray();
            $courses[$key]['wares'] = $wares;
        }
        return  $courses;
    }

    /**
     * @param $course_url
     * @return mixed
     * 课程主页模板所需的所有数据
     */
    public static function getCourse($course_url)
    {
        $user_id = Tool::get_user_id();
        $course = Course::where('url',$course_url)->first()->toArray();
        //处理一些数据
        if(empty($course['notice']))
        {
            $course['notice'] = Config::getConfig('notice_def');
        }
        if(empty($course['reward']))
        {
            $course['reward'] = Config::getConfig('reward_def');
        }
        $data['course'] = $course;

        $data['learn_num'] = Status::getLearnNum($course['id']);
        $data['learn_status'] = Status::getLearnStatus($course['id'],$user_id);
        $data['avg_score'] = round(Score::getAvgScore($course['id']),2);
        $data['teacher'] = User::where('id',$course['add_user_id'])->first()->toArray();
        return $data;
    }
}
