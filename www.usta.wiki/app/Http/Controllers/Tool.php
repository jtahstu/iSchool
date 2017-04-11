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
}
