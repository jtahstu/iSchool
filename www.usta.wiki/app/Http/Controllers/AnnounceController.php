<?php

namespace App\Http\Controllers;

use App\Announce;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class AnnounceController extends Controller
{
    public function announceGetOne()
    {
        $announce = Announce::getDescOne();
        if($announce){
            return Tool::returnMsg(1,$announce);
        }else{
            return Tool::returnMsg(0,'查询公告失败！');
        }
    }


}
