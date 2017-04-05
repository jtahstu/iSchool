<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function showIndex()
    {
        return view('index.index');
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