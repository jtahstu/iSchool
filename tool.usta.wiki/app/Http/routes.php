<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//  return view('welcome');
//});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

//show home page
Route::get('/','CompileController@index');

//show editor view
Route::get('/compile/{id}','CompileController@solve');

//run and share
Route::post('/compiles','CompileController@result');
Route::post('/share','CompileController@share');

//show share code view
Route::get('/share/{linkid}','CompileController@showShare');

//show code archive
Route::get('/share','CompileController@shareList');

//show discuss view
Route::get('/discuss','ToolController@discuss');

//show login view
Route::get('/login','ToolController@login');

//show admin view
Route::get('/admin','ToolController@admin');

//admin ajax
Route::post('/admin/{func}','ToolController@adminFunction');
