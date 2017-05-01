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

    public function add(Request $request)
    {
//        验证评论是否为空
        $comment = $request->input('comment');
        if(empty($comment)){
            return Tool::returnMsg(0,'评论内容不能为空！');
        }

//        验证评论是否太长
        if(mb_strlen(strip_tags($comment))>233){
            return Tool::returnMsg(0,'评论内容过长,再来一条吧！');
        }

//        验证是否登录
        if(!Tool::isLogin()){
            return Tool::returnMsg(0,'请先登录！');
        }
//
////        验证验证码是否正确
//        $comment_code = $request->input('comment_code');
//        if(!$comment_code){
//            return Tool::returnMsg(0,'请输入验证码！');
//        }else{
//            if($comment_code!=\Session()->get('comment_code')){
//                return Tool::returnMsg(0,'验证码错误');
//            }
//        }

        $com = new Comment();
        $com->ref_id = $request->input('course_id');
        $com->comment = strval($comment);
        $com->type = 2;
        $com->add_user_id = Tool::get_user_id();
        $res = $com->save();
        if($res){
            return Tool::returnMsg(1,'评论成功！');
        }else{
            return Tool::returnMsg(0,'评论失败！');
        }



    }
}
