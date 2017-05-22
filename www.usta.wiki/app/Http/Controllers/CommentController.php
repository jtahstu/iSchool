<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;
use App\Comment;
use App\Http\Controllers\Tool;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 课程和课件处的添加评论
     */
    public function add(Request $request)
    {
//        验证评论是否为空
        $comment = $request->input('comment');
        if (empty($comment)) {
            return Tool::returnMsg(0, '评论内容不能为空！');
        }

//        验证评论是否太长
        if (mb_strlen(strip_tags($comment)) > 2333) {
            return Tool::returnMsg(0, '评论内容过长,再来一条吧！');
        }

//        验证是否登录
        if (!Tool::isLogin()) {
            return Tool::returnMsg(0, '请先登录！');
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

        $data['course_id'] = $request->input('course_id');
        $data['comment'] = strval($comment);
        $data['type'] = $request->input('type');
        if ($data['type'] == 1) {
            $data['ware_id'] = $request->input('ware_id');
        }
        $res = Comment::addComment($data);
        if ($res) {
            return Tool::returnMsg(1, '评论成功！');
        } else {
            return Tool::returnMsg(0, '评论失败！');
        }
    }

    public function addLike(Request $request)
    {
        $type = intval($request->input('type'));
        $ref_id = intval($request->input('comment_id'));
        $res = Like::add($type, $ref_id);
        $res2 = Comment::addLike($ref_id);
        if ($res && $res2) {
            return Tool::returnMsg(1, '点赞成功！');
        } else {
            return Tool::returnMsg(0, '点赞失败！');
        }
    }

    public function subLike(Request $request)
    {
        $type = intval($request->input('type'));
        $ref_id = intval($request->input('comment_id'));
        $res = Like::del($type, $ref_id);
        $res2 = Comment::subLike($ref_id);
        if ($res && $res2) {
            return Tool::returnMsg(1, '取消点赞成功！');
        } else {
            return Tool::returnMsg(0, '取消点赞失败！');
        }
    }
}
