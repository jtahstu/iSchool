<?php
/*
 * 用来处理数据库中与在线代码编辑相关的所有操作
 * 包含tool_开头的所有表
 * by jtahstu 2016/9/14
 * 
 * 如果你开始研究本人的这个项目，本人只想对你说
 * 千万别乱动代码 ！！！谨记
 * by jtahstu 2016/9/18
 * 
 * 写的比较乱，有的数据库操作独立成函数了，有的又直接写在函数里面，杂乱无章，本人自己都懒得看懒得改了
 * 注意加功能没问题，但是改的话，你小心一点
 * by jtahstu 2016/9/22
 * 
 * 重修整理了一下，添加每个函数的注释
 * 每个路由规则过来的处理函数的详细介绍补全
 * 少量重构和函数位置调整
 * by jtahstu 2016/9/30
 */
	
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use DB;

class CompileController extends Controller {
	/*
	 * 构造函数
	 */
    function __construct(){
    	
    }
    
	/*
	 * 路由过来的/
	 * 功能：处理首页显示
	 * 返回：首页视图
	 */
    function index(){
    	$language=$this->getToolLangAll();
    	return view('Compile/index',['language'=>$language]);
    }
	
	//获取语言表的所有数据，主要应用于视图nav的显示，每个视图只要用导航栏都需要调用此函数，给视图$language字段
	function getToolLangAll(){
		$language=DB::select('select id,language,value,mode from tool_lang');
		return $language;
	}
    /*
	 * 路由过来的/compile/{id}，由该函数处理
	 * 功能：处理显示编辑器页面所需的数据
	 * 		1、动态生成生成代码模板
	 * 		2、这里对第二种，即html/css/js特殊处理，因为该视图处理方式不同于其他页面
	 * 返回：代码编辑视图
	 */
    function solve($id){
    	$lang=$this->getLanguage($id);
    	$template=$this->getTemplate($id);
 		$realTemplate=str_replace('{{date}}',date('Y年m月d日 H:i:s'),$template[0]->template);  
 		$realTemplate=str_replace('{{year}}',date('Y'),$realTemplate);  
    	$language=$this->getToolLangAll();
    	if($id=='2'){
    		return view('Compile/html',['language'=>$language,'value'=>$lang[0]->value,'lang'=>$lang[0]->language,'mode'=>$lang[0]->mode,'template'=>$realTemplate]);
    	}else{
    		return view('Compile/editor',['language'=>$language,'value'=>$lang[0]->value,'lang'=>$lang[0]->language,'mode'=>$lang[0]->mode,'template'=>$realTemplate]);
    	}
    }
	//根据id获取语言
    function getLanguage($id){
    	$language = DB::select('select * from tool_lang where id = ?', [$id]);
    	return $language;
    }
    //获取各语言的默认模板
    function getTemplate($id){
    	$template = DB::select('select * from tool_temp where id = ?',[$id]);
    	return $template;
    }

	/*
	 * 路由post过来的/compiles，由该函数处理
	 * 功能：该函数处理的是ajax请求，即在代码run时，需要服务器响应处理请求并返回数据
	 * 		1、通过curl模拟请求runoob的接口，获取代码执行的结果
	 * 		2、运行代码时需要先进行存储到表tool_code
	 * 返回：ajax代码执行结果
	 */
    function result(Request $request){
    	$data=Input::all();
    	$code=$data['code'];
    	$value=$data['language'];
    	$back=$this->getResult($code,$value);
    	$this->saveCode($code,$value);
    	echo json_encode(($back));
    }
	//curl获取代码执行结果
    function getResult($code,$language){
    	$url = "http://tool.runoob.com/compile.php";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_REFERER, "http://c.runoob.com/compile/1");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-FORWARDED-FOR:8.8.8.8', 'CLIENT-IP:8.8.8.8'));
		$data = array('code' => $code, 'language' => $language);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$return = curl_exec($ch);
		curl_close($ch);
		$return=json_decode($return);
//		var_dump($return);
		return $return->output.$return->errors;
    }
	//运行代码时存储代码
	 function saveCode($code,$value){
    	$id0=DB::select('select id from tool_lang where value = ?',[$value]);
    	$id=$id0[0]->id;
    	$time=date('Y-m-d H:i:s');
    	$res=DB::insert("insert into tool_code(id,code,type,time) values('',?,?,?)",[$code,$id,$time]);
    	return $res;
    }
	 
	/*
	 * 路由post过来的/share，由该函数处理
	 * 功能：当ajax请求分享代码时，我们需要存储代码到数据库中，并补全其他相关信息
	 * 		 并返回分享的linkid，由前端js补全完整的链接
	 * 返回：ajax代码分享的链接linkid
	 */
    function share(Request $request){	
    	$data=Input::all();
		$title=trim($data['title'])==""?'作者就是懒得写题目...':trim($data['title']);
    	$code=$data['code'];
    	$value=$data['value'];
    	$linkid=$this->getShareCount()+1;
    	$time=date('Y-m-d H:i:s');
    	$res=$this->saveShareCode($linkid,$title,$code,$value,$time);
    	if($res){
    		echo json_encode($linkid);
    	}else{
    		echo json_encode('errors');
    	}
    }
	//获取数据库中已经存储有多少分享代码了
	function getShareCount(){
    	$count=DB::select('select count(id) as count from tool_share');
    	return $count[0]->count;
    }
	//保存分享的代码
     function saveShareCode($linkid,$title,$code,$value,$time){
    	$res=DB::insert("insert into tool_share(id,linkid,title,code,value,time,view) values('',?,?,?,?,?,0)",[$linkid,$title,$code,$value,$time]);
    	return $res;
    }
	 
	/*
	 * 路由get过来的/share/{linkid}，由该函数处理
	 * 功能：这是当用户请求分享代码页面时的处理函数
	 * 		 1、没磁请求，需要在数据库中增加该文章的view数
	 * 		 2、数据库读取获得分享代码和相关信息
	 * 返回：某篇代码分享视图
	 */ 
    function showShare($linkid){
    	//这里判断获取分享代码的linkid是否合法，2016/09/22
    	if(!DB::select('select code from tool_share where linkid = ?',[$linkid])){	
    		return view('welcome');
    	}
    	
    	$this->addShareView($linkid);
    	$mode=$this->getMode($linkid);
    	$data=$this->getShare($linkid);
		$title=$data[0]->title;
    	$code=$data[0]->code;
    	$time=$data[0]->time;
    	$view=$data[0]->view;
    	$value=$this->getShareValue($linkid);
    	$language=$this->getToolLangAll();
    	return view('Compile/share',['title'=>$title,'code'=>$code,'mode'=>$mode,'time'=>$time,'view'=>$view,'values'=>$value,'language'=>$language]);
    }
	//分享的代码view数加一
    function addShareView($linkid){
    	$view0=DB::select('select view from tool_share where linkid = ?',[$linkid]);
    	$view=$view0[0]->view+1;
    	DB::update('update tool_share set view = ? where linkid = ?',[$view,$linkid]);
    }
	//获取ace编辑器需要的着色模式
	function getMode($linkid){
    	$value0=DB::select('select value from tool_share where linkid = ?',[$linkid]);
    	$value=$value0[0]->value;
    	$mode=DB::select('select mode from tool_lang where value = ?',[$value]);
    	return $mode[0]->mode;
    }
	//获取分享代码的相关数据
	function getShare($linkid){
    	$code=DB::select('select title,code,time,view from tool_share where linkid = ?',[$linkid]);
    	return $code;
    }
	//获取runoob接口各语言的值
	function getShareValue($linkid){
    	$value0=DB::select('select value from tool_share where linkid = ?',[$linkid]);
    	return $value0[0]->value;
    }
    
	/*
	 * 路由过来的/share，由该函数处理
	 * 功能：显示所有的分享代码
	 * 		 1、每30行代码分页
	 * 		 2、由于分享代码里存储的是runoob接口的语言值，而不是语言的字符串，所以需要建立一个散列表
	 * 			即，建立value--language的键值对数组
	 * 		 3、其他显示代码列表的相关数据
	 * 返回：代码归档视图
	 */
    function shareList(){
    	$shareList= DB::table('tool_share')->paginate(30);
    	$language=$this->getToolLangAll();
    	$valueLanguage=array();
    	foreach ($language as $key ) {
    		$valueLanguage[$key->value]=$key->language;
    	}
		return view('Compile/list',['list'=>$shareList,'language'=>$language,'valueLanguage'=>$valueLanguage]);
    }

}
