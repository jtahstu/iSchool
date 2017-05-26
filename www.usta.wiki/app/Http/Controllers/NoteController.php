<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Like;

use App\Http\Requests;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addLike(Request $request)
    {
        $type = intval($request->input('type'));
        $ref_id = intval($request->input('note_id'));
        $res = Like::add($type,$ref_id);
        $res2 = Note::addLike($ref_id);
        if($res && $res2){
            return Tool::returnMsg(1,'点赞成功！');
        }else{
            return Tool::returnMsg(0,'点赞失败！');
        }
    }

    public function subLike(Request $request)
    {
        $type = intval($request->input('type'));
        $ref_id = intval($request->input('note_id'));
        $res = Like::del($type,$ref_id);
        $res2 = Note::subLike($ref_id);
        if($res && $res2){
            return Tool::returnMsg(1,'取消点赞成功！');
        }else{
            return Tool::returnMsg(0,'取消点赞失败！');
        }
    }

    public function noteAddDo(Request $request)
    {
        $course_id = $request->input('course_id');
        $ware_id = $request->input('ware_id');
        $n_note = $request->input('n_note');
        if(!($course_id&&$ware_id&&$n_note)){
            return Tool::returnMsg(0,'参数传递错误');
        }

        $note = new Note();
        $note->course_id = $course_id;
        $note->ware_id = $ware_id;
        $note->note = $n_note;
        $note->add_user_id = Tool::get_user_id();
        $res = $note->save();
        if($res){
            return Tool::returnMsg(1,'添加笔记成功！');
        }else{
            return Tool::returnMsg(0,'添加笔记失败！');
        }
    }
}
