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
        $comment = $request->input('comment');
        $com = new Comment();
        $com->ref_id = $id;
        $com->comment = strval($comment);
        $com->type = 1;
        $com->add_user_id = 1;
        $res = $com->save();
        if($res){
            return 1;
        }else{
            return 2;
        }
    }
}
