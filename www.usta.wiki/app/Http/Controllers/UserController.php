<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    /**
     * @param $user_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 个人中心首页
     */
    public function index($user_id)
    {

        return view('user.index');
    }

    public function getOne(Request $request)
    {
        $user_id = $request->input('id');
        $user = User::where('id',$user_id)->first()->toArray();
        if($user){
            return Tool::returnMsg(1,$user);
        }else{
            return Tool::returnMsg(0,'用户查询失败');
        }

    }
}
