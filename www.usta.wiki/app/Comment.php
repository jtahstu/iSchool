<?php

namespace App;

use App\Http\Controllers\Tool;
use Illuminate\Database\Eloquent\Model;
use DB;

class Comment extends Model
{
    /**
     * @param $course_id
     * @param $page
     * @return mixed
     */
    public static function getCourseComments($course_id,$page)
    {
        $user_id = Tool::get_user_id();
        //页面评论
        $comments = DB::select('
select *
from
				(select a.*,
						b.name,
						b.head_pic,
						c.title,
						c.url,

									(select count(*)
										from ischool_likes d
										where d.type=1
														and d.ref_id=a.id
														and user_id=?)like_status
					from ischool_comments a
					left join ischool_users b on a.add_user_id=b.id
					left join ischool_details c on a.ware_id=c.id
					where a.type=1
									and c.course_id=?
					union select a.*,
						b.name,
						b.head_pic,
						c.name title,
						c.url,

									(select count(*)
										from ischool_likes d
										where d.type=1
														and d.ref_id=a.id
														and user_id=?)like_status
					from ischool_comments a
					left join ischool_users b on a.add_user_id=b.id
					left join ischool_courses c on a.course_id=c.id
					where a.type=2
									and c.id=?)aa
order by aa.like desc,
	aa.id desc limit ?,10
        ',[$user_id,$course_id,$user_id,$course_id,($page-1)*10]);
        return $comments;
    }

    /**
     * @param $ware_id
     * @param $page
     * @return mixed
     * 课件的评论,按页数
     */
    public static function getWareComments($ware_id,$page)
    {
        $user_id = Tool::get_user_id();
        $comments = DB::select('
select *
from
				(select a.*,
						b.name,
						b.head_pic,
						c.title,
						c.url,

									(select count(*)
										from ischool_likes d
										where d.type=1
														and d.ref_id=a.id
														and user_id=?)like_status
					from ischool_comments a
					left join ischool_users b on a.add_user_id=b.id
					left join ischool_details c on a.ware_id=c.id
					where a.type=1
									and c.id=?
					)aa
order by aa.like desc,
	aa.id desc limit ?,10
        ',[$user_id,$ware_id,($page-1)*10]);
        return $comments;
    }

    /**
     * @param $course_id
     * @return mixed
     */
    public static function getCourseCommentsCount($course_id)
    {
        $res = DB::select('select count(*)c from ischool_comments where course_id=?',[$course_id]);
        return $res[0]->c;
    }

    /**
     * @param $course_id
     * @return mixed
     */
    public static function getWareCommentsCount($ware_id)
    {
        $res = DB::select('select count(*)c from ischool_comments where ware_id=?',[$ware_id]);
        return $res[0]->c;
    }

    /**
     * @param $data
     * @return bool
     */
    public static function addComment($data)
    {
        $comment = new Comment();
        $comment->course_id = $data['course_id'];
        $comment->type = $data['type'];
        if($data['type']==1){
            $comment->ware_id = $data['ware_id'];
        }
        $comment->comment = $data['comment'];
        $comment->add_user_id = Tool::get_user_id();
        return $comment->save();
    }

    /**
     * @param $comment_id
     * @return mixed
     */
    public static function addLike($comment_id)
    {
        $like_row = Comment::where('id',$comment_id)->get(['like'])->toArray();
        $comment = Comment::find($comment_id);
        $comment->like = intval($like_row[0]['like'])+1;
        return $comment->save();
    }

    /**
     * @param $comment_id
     * @return mixed
     */
    public static function subLike($comment_id)
    {
        $like_row = Comment::where('id',$comment_id)->get(['like'])->toArray();
        $comment = Comment::find($comment_id);
        $comment->like = intval($like_row[0]['like'])-1;
        return $comment->save();
    }
}
