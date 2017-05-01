<?php

namespace App;

use App\Http\Controllers\Tool;
use Illuminate\Database\Eloquent\Model;
use DB;

class Comment extends Model
{
    public static function getCourseComments($course_id)
    {
        $user_id = Tool::get_user_id();
        //页面评论
        $comments = DB::select('select a.*,
	b.name,b.head_pic,
	c.title,c.url,
	(select count(*) from ischool_likes d where d.type=1 and d.ref_id=a.id and user_id=?)like_status
from ischool_comments a
left join ischool_users b on a.add_user_id=b.id
left join ischool_details c on a.ref_id=c.id
where a.type in (1,2) and c.course_id=?
order by a.like desc,a.id desc',[$user_id,$course_id]);
        return $comments;
    }
}
