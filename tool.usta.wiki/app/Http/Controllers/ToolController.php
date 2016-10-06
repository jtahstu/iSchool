<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use DB;

class ToolController extends Controller {
	function __construct(){
		
	}
	
	//获取网站配置文件
	function getConfig(){
		$config=DB::select('select * from tool_config');
		$configArray=array();
		foreach($config as $rec){
			$configArray[$rec->k]=$rec->value;
		}
		return $configArray;
	}
	/*
	 * 路由过来的/discuss
	 * 返回：讨论交流视图
	 */
	function discuss(){
		$sharePaginate=$this->getSharePaginate();
		return view('Tool/discuss',['config'=>$this->getConfig(),'sharePaginate'=>$sharePaginate]);
	}
	//获取分页
	function getSharePaginate(){
		$config=$this->getConfig();
		$paginateCount=$config['paginateCount'];
		$shareList= DB::table('tool_share')->paginate($paginateCount);
		return $shareList;
	}
	 
	/*
	 * 路由过来的/login
	 * 返回：管理员登录页面
	 */
	 function login(){
	 	$sharePaginate=$this->getSharePaginate();
		return view('Tool/login',['config'=>$this->getConfig(),'sharePaginate'=>$sharePaginate]);
	 }
	 
	/*
	 * 路由过来的/admin
	 * 返回：管理页面
	 */
	 function admin(){
	 	$sharePaginate=$this->getSharePaginate();
		return view('Tool/admin',['config'=>$this->getConfig(),'sharePaginate'=>$sharePaginate]);
	 }
	 
	 /*
	  * 路由post过来的/admin/{func}
	  * 返回：ajax网站配置数据是否修改成功
	  */
	 
	 function adminFunction($func){
	 	$data=Input::all();
		if($func=='global'){
			$title=htmlentities($data['title']);
			$key=htmlentities($data['key']);
			$des=htmlentities($data['des']);
			$icon=htmlentities($data['icon']);
			$version=htmlentities($data['version']);
			$cnzz=htmlentities($data['cnzz']);
			$headAddCode=htmlentities($data['headAddCode']);
			$res=$this->setConfigGlobal($title,$key,$des,$icon,$version,$cnzz,$headAddCode);
			echo $res?'1':'0';
		}else if($func=='index'){
			$indexMessage=htmlentities($data['indexMessage']);
			$indexBarragerImg=htmlentities($data['indexBarragerImg']);
			$indexBarragerInfo=htmlentities($data['indexBarragerInfo']);
			$indexBarragerLink=htmlentities($data['indexBarragerLink']);
			$res=$this->setConfigIndex($indexMessage,$indexBarragerImg,$indexBarragerInfo,$indexBarragerLink);
			echo $res?'1':'0';
		}else if($func=='foot'){
			$footDes=htmlentities($data['footDes']);
			$footRecord=htmlentities($data['footRecord']);
			$footEmail=htmlentities($data['footEmail']);
			$footCopy=htmlentities($data['footCopy']);
			$res=$this->setConfigFoot($footDes,$footRecord,$footEmail,$footCopy);
			echo $res?'1':'0';
		}else if($func=='editor'){
			$editorTitle=htmlentities($data['editorTitle']);
			$editorTheme=htmlentities($data['editorTheme']);
			$editorHeight=htmlentities($data['editorHeight']);
			$res=$this->setConfigEditor($editorTitle,$editorTheme,$editorHeight);
			echo $res?'1':'0';
		}else if($func=='list'){
			$defaultTitle=htmlentities($data['defaultTitle']);
			$paginateCount=htmlentities($data['paginateCount']);
			$listCodeLength=htmlentities($data['listCodeLength']);
			$res=$this->setConfigList($defaultTitle,$paginateCount,$listCodeLength);
			echo $res?'1':'0';
		}
		
	 }
	function setConfigGlobal($title,$key,$des,$icon,$version,$cnzz,$headAddCode){
		$res1=DB::table('tool_config')->where('k', 'title')->update(['value' => $title]);
		$res2=DB::table('tool_config')->where('k', 'keyword')->update(['value' => $key]);
		$res3=DB::table('tool_config')->where('k', 'des')->update(['value' => $des]);
		$res4=DB::table('tool_config')->where('k', 'icon')->update(['value' => $icon]);
		$res5=DB::table('tool_config')->where('k', 'version')->update(['value' => $version]);
		$res6=DB::table('tool_config')->where('k', 'cnzz')->update(['value' => $cnzz]);
		$res7=DB::table('tool_config')->where('k', 'headAddCode')->update(['value' => $headAddCode]);
		return $res1||$res2||$res3||$res4||$res5||$res6||$res7;
	}
	function setConfigIndex($indexMessage,$indexBarragerImg,$indexBarragerInfo,$indexBarragerLink){
		$res1=DB::table('tool_config')->where('k', 'indexMessage')->update(['value' => $indexMessage]);
		$res2=DB::table('tool_config')->where('k', 'indexBarragerImg')->update(['value' => $indexBarragerImg]);
		$res3=DB::table('tool_config')->where('k', 'indexBarragerInfo')->update(['value' => $indexBarragerInfo]);
		$res4=DB::table('tool_config')->where('k', 'indexBarragerLink')->update(['value' => $indexBarragerLink]);
		return $res1||$res2||$res3||$res4;
	}
	function setConfigFoot($footDes,$footRecord,$footEmail,$footCopy){
		$res1=DB::table('tool_config')->where('k', 'footDes')->update(['value' => $footDes]);
		$res2=DB::table('tool_config')->where('k', 'footRecord')->update(['value' => $footRecord]);
		$res3=DB::table('tool_config')->where('k', 'footEmail')->update(['value' => $footEmail]);
		$res4=DB::table('tool_config')->where('k', 'footCopy')->update(['value' => $footCopy]);
		return $res1||$res2||$res3||$res4;
	}
	function setConfigEditor($editorTitle,$editorTheme,$editorHeight){
		$res1=DB::table('tool_config')->where('k', 'editorTitle')->update(['value' => $editorTitle]);
		$res2=DB::table('tool_config')->where('k', 'editorTheme')->update(['value' => $editorTheme]);
		$res3=DB::table('tool_config')->where('k', 'editorHeight')->update(['value' => $editorHeight]);
		return $res1||$res2||$res3;
	}
	function setConfigList($defaultTitle,$paginateCount,$listCodeLength){
		$res1=DB::table('tool_config')->where('k', 'defaultTitle')->update(['value' => $defaultTitle]);
		$res2=DB::table('tool_config')->where('k', 'paginateCount')->update(['value' => $paginateCount]);
		$res3=DB::table('tool_config')->where('k', 'listCodeLength')->update(['value' => $listCodeLength]);
		return $res1||$res2||$res3;
	}
}