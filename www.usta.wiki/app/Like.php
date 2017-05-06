<?php

namespace App;

use App\Http\Controllers\Tool;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    public static function add($type,$ref_id)
    {
        $like = new Like();
        $like->type = $type;
        $like->ref_id = $ref_id;
        $like->user_id = Tool::get_user_id();
        return $like->save();
    }

    public static function del($type,$ref_id)
    {
        return Like::where('ref_id',$ref_id)->where('type',$type)->delete();
    }
}
