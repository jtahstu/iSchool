<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Tool;
use DB;

class Problem extends Model
{
    /**
     * @param $course_id    课程id
     * @param $page 页面
     * @return mixed 分页后的问答
     * 获取课程问答的数据
     */
    public static function getCourseProblems($course_id,$page)
    {
        $user_id = Tool::get_user_id();

        $problems = DB::select('
select a.*,
	b.name,
	b.head_pic,
	c.title ware_title,
	c.url,

				(select count(*)
					from ischool_likes d
					where d.type=2
									and d.ref_id=a.id
									and user_id=?)like_status ,
				(select count(*)
					from ischool_answers e
					where e.problem_id=a.id)answer_count
from ischool_problems a
left join ischool_users b on a.user_id=b.id
left join ischool_details c on a.ware_id=c.id
where a.course_id=? and a.is_delete=0
order by a.like desc,
	a.id desc limit ?,10
        ',[$user_id,$course_id,($page-1)*10]);
        return $problems;
    }

    public static function getWareProblems($ware_id,$page)
    {
        $user_id = Tool::get_user_id();

        $problems = DB::select('
select a.*,
	b.name,
	b.head_pic,
	c.title ware_title,
	c.url,

				(select count(*)
					from ischool_likes d
					where d.type=2
									and d.ref_id=a.id
									and user_id=?)like_status ,
				(select count(*)
					from ischool_answers e
					where e.problem_id=a.id)answer_count
from ischool_problems a
left join ischool_users b on a.user_id=b.id
left join ischool_details c on a.ware_id=c.id
where a.ware_id=? and a.is_delete=0
order by a.like desc,
	a.id desc limit ?,10
        ',[$user_id,$ware_id,($page-1)*10]);
        return $problems;
    }

    /**
     * @param $course_id
     * @return mixed 该课程的问答数
     */
    public static function getCourseProblemsCount($course_id)
    {
        $res = DB::select('select count(*)c from ischool_problems where course_id=? and is_delete=0',[$course_id]);
        return $res[0]->c;
    }

    public static function getWareProblemsCount($ware_id)
    {
        $res = DB::select('select count(*)c from ischool_problems where ware_id=? and is_delete=0',[$ware_id]);
        return $res[0]->c;
    }

    /**
     * @param $data
     * @return bool
     */
    public static function addProblem($data)
    {
        $problem = new Problem();
        $problem->course_id = $data['course_id'];
        $problem->ware_id = $data['ware_id'];
        $problem->comment = $data['comment'];
        $problem->add_user_id = Tool::get_user_id();
        return $problem->save();
    }

    /**
     * @param $problem_id
     * @return mixed
     */
    public static function addLike($problem_id)
    {
        $like_row = Problem::where('id',$problem_id)->get(['like'])->toArray();
        $problem = Problem::find($problem_id);
        $problem->like = intval($like_row[0]['like'])+1;
        return $problem->save();
    }

    /**
     * @param $problem_id
     * @return mixed
     */
    public static function subLike($problem_id)
    {
        $like_row = Problem::where('id',$problem_id)->get(['like'])->toArray();
        $problem = Problem::find($problem_id);
        $problem->like = intval($like_row[0]['like'])-1;
        return $problem->save();
    }
}
