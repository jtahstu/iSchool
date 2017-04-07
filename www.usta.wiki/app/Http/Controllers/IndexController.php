<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Course;


class IndexController extends Controller
{
    public function showIndex()
    {
        $courses = Course::all();

        return view('index.index',['courses'=>$courses]);
    }
	
	public function show404()
	{
		return view('index.404');
	}
	
	public function show500()
	{
		return view('index.500');
	}
}