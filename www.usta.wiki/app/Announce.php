<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announce extends Model
{
    public static function getDescOne()
    {
        return Announce::all()->sortByDesc('id')->first()->toArray();
    }

    public static function getById($id)
    {
        return Announce::where('id',$id)->first()->toArray();
    }
}
