<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    /**
     * @param $course_id
     * @return mixed
     * 获取某个课程的平均分
     */
    public static function getAvgScore($course_id)
    {
        return Score::where('course_id',$course_id)->avg('score');
    }
}
