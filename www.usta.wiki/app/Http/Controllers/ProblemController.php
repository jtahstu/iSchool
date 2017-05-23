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
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function problemAddDo(Request $request)
    {
        $course_id = $request->input('course_id');
        $ware_id = $request->input('ware_id');
        $p_title = $request->input('p_title');
        $p_problem = $request->input('p_problem');
        if(!($course_id&&$ware_id&&$p_title&&$p_problem)){
            return Tool::returnMsg(0,'参数传递错误');
        }

        $problem = new Problem();
        $problem->course_id = $course_id;
        $problem->ware_id = $ware_id;
        $problem->title = $p_title;
        $problem->problem = $p_problem;
        $problem->user_id = Tool::get_user_id();
        $res = $problem->save();
        if($res){
            return Tool::returnMsg(1,'提问成功！');
        }else{
            return Tool::returnMsg(0,'提问失败！');
        }
    }

}