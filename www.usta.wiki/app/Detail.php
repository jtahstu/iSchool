<?php

namespace App;

use App\Http\Controllers\Tool;
use Illuminate\Database\Eloquent\Model;
use DB;

class Detail extends Model
{
    /**
     * @param $course_id
     * @return mixed
     * 获取课程的所有课件内容
     */
    public static function getCourseWares($course_id)
    {
        return Detail::where('course_id',$course_id)->get()->toArray();
    }

    public static function getCourseWareMenu($course_id)
    {
        $user_id = Tool::get_user_id();
        $sql = "select a.id,a.title,a.url,a.first,a.node_des
,(select count(*) from ischool_statuses b where b.type=2 and b.ware_id=a.id and b.user_id=?)status
  from ischool_details a where course_id=?";
        return DB::select($sql,[$user_id,$course_id]);
    }
}
