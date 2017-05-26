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

Route::get('/course','CourseController@index');
Route::get('/show', 'CourseController@show');
Route::get('/comment','CourseController@comment');
Route::get('/problem','CourseController@problem');
Route::get('/note','CourseController@note');
Route::get('/problem-answer','ProblemController@problemAnswer');

Route::post('/course-ware-learn','CourseController@learn');
Route::post('/comment','CommentController@add');
Route::post('/like','CommentController@addLike');
Route::post('/dislike','CommentController@subLike');
Route::post('/problem-like','ProblemController@addLike');
Route::post('/problem-dislike','ProblemController@subLike');
Route::post('/note-like','NoteController@addLike');
Route::post('/note-dislike','NoteController@subLike');

Route::get('/itool','IndexController@showITool');

Route::get('/u/{user_id}','UserController@index');

/**
 * Admin
 */
Route::get('/admin',['uses'=>'AdminController@index']);
Route::get('/admin-course',['uses'=>'AdminController@course']);
Route::get('/set',['uses'=>'AdminController@set']);

Route::get('/setting',['uses'=>'AdminController@setting']);

Route::get('/course-add',['uses'=>'AdminController@courseAdd']);
Route::post('/course-add-do',['uses'=>'AdminController@courseAddDo']);
Route::get('/course-edit/{id}',['uses'=>'AdminController@courseEdit']);
Route::post('/course-edit-do',['uses'=>'AdminController@courseEditDo']);
Route::post('/course-del-do',['uses'=>'AdminController@courseDelDo']);

Route::get('/course-ware-add/{id}',['uses'=>'AdminController@courseWareAdd']);
Route::post('/course-ware-add-do',['uses'=>'AdminController@courseWareAddDo']);
Route::get('/course-ware-edit/{id}',['uses'=>'AdminController@courseWareEdit']);
Route::post('/course-ware-edit-do',['uses'=>'AdminController@courseWareEditDo']);
Route::post('/course-ware-del-do',['uses'=>'AdminController@courseWareDelDo']);

Route::post('/config-add-do',['uses'=>'AdminController@configAddDo']);
Route::post('/config-get-one',['uses'=>'AdminController@configGetOne']);
Route::post('/config-edit-do',['uses'=>'AdminController@configEditDo']);

Route::get('/search', ['uses'=>'CourseController@search']);



Route::get('/timeline','IndexController@timeLine');
Route::get('/git','AdminController@git');
Route::post('/git-add-do','AdminController@gitAddDo');

Route::get('/admin-comment','AdminController@comment');
Route::post('/course-comment-del-do','AdminController@courseCommentDelDo');
Route::get('/admin-note','AdminController@note');
Route::post('/course-note-del-do','AdminController@courseNoteDelDo');



Route::get('/admin-problem','AdminController@problem');

Route::get('/img/{name?}/{tmp}', 'ImgController@captcha');

Route::post('/user-edit-do','AdminController@userEditDo');
Route::get('/user','AdminController@user');
Route::post('/user-get-one','UserController@getOne');

Route::get('/announce','AnnounceController@index');
Route::get('/announce-add','AnnounceController@announceAdd');
Route::get('/announce-manage','AnnounceController@announceManage');
Route::post('/announce-get-one','AnnounceController@announceGetOne');

Route::get('/links','IndexController@links');

Route::post('/problem-add-do','ProblemController@problemAddDo');
Route::post('/note-add-do','NoteController@noteAddDo');
