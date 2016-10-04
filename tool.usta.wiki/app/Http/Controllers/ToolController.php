<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use DB;
use Config;

class ToolController extends Controller {
	function __construct(){
		
	}
	/*
	 * 路由过来的/discuss
	 * 返回：讨论交流视图
	 */
	function discuss(){
		$sharePaginate=$this->getSharePaginate();
		return view('Tool/discuss',['sharePaginate'=>$sharePaginate]);
	}
	//获取分页
	function getSharePaginate(){
		$paginateCount=\Config::get('itool.paginateCount');
		$shareList= DB::table('tool_share')->paginate($paginateCount);
		return $shareList;
	}
	
	/*
	 * 路由过来的/search
	 * 返回：搜索页面
	 */
	 function search(){
	 	$sharePaginate=$this->getSharePaginate();
		return view('Tool/search',['sharePaginate'=>$sharePaginate]);
	 }
	 
	/*
	 * 路由过来的/login
	 * 返回：管理员登录页面
	 */
	 function login(){
	 	$sharePaginate=$this->getSharePaginate();
		return view('Tool/login',['sharePaginate'=>$sharePaginate]);
	 }
	 
	/*
	 * 路由过来的/admin
	 * 返回：管理页面
	 */
	 function admin(){
	 	$sharePaginate=$this->getSharePaginate();
		return view('Tool/admin',['sharePaginate'=>$sharePaginate]);
	 }
}