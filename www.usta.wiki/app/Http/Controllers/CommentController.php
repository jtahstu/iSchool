<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;
use App\Comment;
use App\Http\Controllers\Tool;

class CommentController extends Controller
{

    public function add(Request $request,$id)
    {
        if(Tool::isLogin()){
            $comment = $request->input('comment');
            $com = new Comment();
            $com->ref_id = $id;
            $com->comment = strval($comment);
            $com->type = 1;
            $com->add_user_id = Tool::get_user_id();
            $res = $com->save();
            if($res){
                return Tool::returnMsg(1,'评论成功！');
            }else{
                return Tool::returnMsg(0,'评论失败！');
            }
        }else{
            return Tool::returnMsg(0,'请先登录！');
        }

    }
}
