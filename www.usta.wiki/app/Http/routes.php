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
/**
 * Auth
 */
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
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

/**
 * Index
 */
Route::get('/', 'IndexController@showIndex');

Route::get('/show', ['uses'=>'CourseController@show']);

/**
 * Admin
 */
Route::get('/admin',['uses'=>'AdminController@index']);
Route::get('/admin-course',['uses'=>'AdminController@course']);
Route::get('/setting',['uses'=>'AdminController@setting']);
Route::get('/course-add',['uses'=>'AdminController@courseAdd']);
Route::post('/course-add-do',['uses'=>'AdminController@courseAddDo']);
Route::get('/course-edit/{id}',['uses'=>'AdminController@courseEdit']);
Route::post('/course-edit-do',['uses'=>'AdminController@courseEditDo']);
Route::get('/course-del/{id}',['uses'=>'AdminController@courseDel']);


Route::get('/search', ['uses'=>'CourseController@search']);

Route::post('/comment/{id}',['uses'=>'CommentController@add']);
