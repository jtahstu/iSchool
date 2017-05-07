<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;
use App\Problem;
use App\Http\Controllers\Tool;

class ProblemController extends Controller
{
    public function problemAnswer()
    {
        $id = Input::get('problem_id');

        return view('course.problem-answer');
    }
    public function addLike(Request $request)
    {
        $type = intval($request->input('type'));
        $ref_id = intval($request->input('problem_id'));
        $res = Like::add($type,$ref_id);
        $res2 = Problem::addLike($ref_id);
        if($res && $res2){
            return Tool::returnMsg(1,'点赞成功！');
        }else{
            return Tool::returnMsg(0,'点赞失败！');
        }
    }

    public function subLike(Request $request)
    {
        $type = intval($request->input('type'));
        $ref_id = intval($request->input('problem_id'));
        $res = Like::del($type,$ref_id);
        $res2 = Problem::subLike($ref_id);
        if($res && $res2){
            return Tool::returnMsg(1,'取消点赞成功！');
        }else{
            return Tool::returnMsg(0,'取消点赞失败！');
        }
    }

}