<?php

namespace App;

use App\Http\Controllers\Tool;
use Illuminate\Database\Eloquent\Model;
use DB;

class Note extends Model
{
    public static function getCourseNotes($course_id,$page)
    {
        $user_id = Tool::get_user_id();

        $notes = DB::select('
select a.*,
	b.name,
	b.head_pic,
	c.title,
	c.url,

				(select count(*)
					from ischool_likes d
					where d.type=3
									and d.ref_id=a.id
									and d.user_id=?)like_status
from ischool_notes a
left join ischool_users b on a.add_user_id=b.id
left join ischool_details c on a.ware_id=c.id
where a.course_id=?
				and a.is_delete=0
order by a.like desc,
	a.id desc limit ?,10
        ',[$user_id,$course_id,($page-1)*10]);
        return $notes;
    }

    public static function getWareNotes($ware_id,$page)
    {
        $user_id = Tool::get_user_id();

        $notes = DB::select('
select a.*,
	b.name,
	b.head_pic,
	c.title,
	c.url,

				(select count(*)
					from ischool_likes d
					where d.type=3
									and d.ref_id=a.id
									and d.user_id=?)like_status
from ischool_notes a
left join ischool_users b on a.add_user_id=b.id
left join ischool_details c on a.ware_id=c.id
where a.ware_id=?
				and a.is_delete=0
order by a.like desc,
	a.id desc limit ?,10
        ',[$user_id,$ware_id,($page-1)*10]);
        return $notes;
    }

    public static function getCourseNotesCount($course_id)
    {
        $res = DB::select('select count(*)c from ischool_notes where course_id=? and is_delete=0',[$course_id]);
        return $res[0]->c;
    }

    public static function getWareNotesCount($ware_id)
    {
        $res = DB::select('select count(*)c from ischool_notes where ware_id=? and is_delete=0',[$ware_id]);
        return $res[0]->c;
    }

    /**
     * @param $comment_id
     * @return mixed
     */
    public static function addLike($note_id)
    {
        $like_row = Note::where('id',$note_id)->get(['like'])->toArray();
        $comment = Note::find($note_id);
        $comment->like = intval($like_row[0]['like'])+1;
        return $comment->save();
    }

    /**
     * @param $comment_id
     * @return mixed
     */
    public static function subLike($note_id)
    {
        $like_row = Note::where('id',$note_id)->get(['like'])->toArray();
        $comment = Note::find($note_id);
        $comment->like = intval($like_row[0]['like'])-1;
        return $comment->save();
    }
}