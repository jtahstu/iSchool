<?php

namespace App;

use App\Http\Controllers\Tool;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * @param $course_id
     * @return mixed
     * 获取某个课程的学习数
     */
    public static function getLearnNum($course_id)
    {
        return Status::where('course_id',$course_id)->where('type',1)->count();
    }

    /**
     * @param $course_id
     * @param $user_id
     * @return mixed
     * 获取改课程用户的学习状态，1为已学习，0为未学习
     */
    public static function getLearnStatus($course_id,$user_id)
    {
        return Status::where('course_id',$course_id)->where('type',1)->where('user_id',$user_id)->count();
    }

    public static function addLearnStatus($course_id,$ware_id)
    {
        $course_status = Status::where('type',1)->where('course_id',$course_id)->where('user_id',Tool::get_user_id())->count();
        $ware_status = Status::where('type',2)->where('course_id',$course_id)->where('ware_id',$ware_id)->where('user_id',Tool::get_user_id())->count();
        if($course_status==0){
            Status::addCourseStatus($course_id);
            Status::addWareStatus($course_id,$ware_id);
        }else{
            if($ware_status==0){
                Status::addWareStatus($course_id,$ware_id);
            }
        }
    }

    /**
     * @param $course_id
     * 添加课程学习状态
     */
    public static function addCourseStatus($course_id)
    {
        $course_status = new Status();
        $course_status->type = 1;
        $course_status->course_id = $course_id;
        $course_status->user_id = Tool::get_user_id();
        $course_status->save();
    }

    /**
     * @param $course_id
     * @param $ware_id
     * 添加课件学习状态
     */
    public static function addWareStatus($course_id,$ware_id)
    {
        $ware_status = new Status();
        $ware_status->type = 2;
        $ware_status->course_id = $course_id;
        $ware_status->ware_id = $ware_id;
        $ware_status->user_id = Tool::get_user_id();
        $ware_status->save();
    }
}
