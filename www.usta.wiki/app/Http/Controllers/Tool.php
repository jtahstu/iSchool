<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Tool extends Controller
{
    //
    public static function getDateTime()
    {
        return date('Y-m-d H:i:s');
    }

    public static function getDate()
    {
        return date('Y-m-d');
    }

    public static function get_user_id()
    {
        return \Auth::user()->id;
    }

    //获取用户级别
    public static function getLevel()
    {
        if(in_array(\Auth::user()->id,[1,2,3,4,5]))
            return 1;
        else
            return 2;
    }

    public static function isLogin()
    {
        return \Auth::check();
    }

    public static function returnMsg($status,$msg)
    {
        return response()->json(array(
            'status' => $status,
            'msg' => $msg
        ));
    }
}
