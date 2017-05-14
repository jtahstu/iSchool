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
}
