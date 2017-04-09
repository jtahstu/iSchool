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

/**
 * Error
 */
Route::get('/404',function(){
	return view('index.404');
}); 
Route::get('/500',function(){
	return view('index.500');
}); 

Route::get('/', 'IndexController@showIndex');

Route::get('/show', ['uses'=>'CourseController@show']);

Route::get('/admin',['uses'=>'AdminController@index']);
Route::get('/admin-course',['uses'=>'AdminController@course']);

Route::get('/search', ['uses'=>'CourseController@search']);
Route::post('/search', ['uses'=>'CourseController@search']);