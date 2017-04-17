<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Course;
use App\Git;


class IndexController extends Controller
{
    public function showIndex()
    {
        $courses = Course::all()->sortBy('sort');

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

	public function timeLine()
    {
        $git = array_reverse(Git::all()->toArray());
        return view('index.timeline',['gits'=>$git]);
    }

}