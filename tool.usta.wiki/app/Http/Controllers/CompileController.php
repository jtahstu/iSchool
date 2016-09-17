<?php
/*
 * 用来处理数据库中与在线代码编辑相关的所有操作
 * 包含tool_lang、tool_temp
 * by jtahstu 2016/9/14
 */
	
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use DB;

class CompileController extends Controller {
    //
    function __construct(){
    	
    }
    
    function index(){
    	$language=DB::select('select id,language from tool_lang');
    	return view('Compile/index',['language'=>$language]);
    }
    
    function solve($id){
    	$lang=$this->getLanguage($id);
    	$template=$this->getTemplate($id);
 		$realTemplate=str_replace('{{date}}',date('Y年m月d日 H:i:s'),$template[0]->template);  
 		$realTemplate=str_replace('{{year}}',date('Y'),$realTemplate);  
    	$language=DB::select('select id,language from tool_lang');
//  	var_dump($template);
//		var_dump($id);
//		var_dump($language);
    	return view('Compile/editor',['language'=>$language,'value'=>$lang[0]->value,'lang'=>$lang[0]->language,'mode'=>$lang[0]->mode,'template'=>$realTemplate]);
    }
    
    function result(Request $request){
    	$data=Input::all();
    	$code=$data['code'];
    	$value=$data['language'];
    	$back=$this->getResult($code,$value);
    	$this->saveCode($code,$value);
    	echo json_encode(($back));
    }
    
    function share(Request $request){	
    	$data=Input::all();
    	$code=$data['code'];
    	$value=$data['value'];
    	$linkid=$this->getShareCount()+1;
    	$time=date('Y-m-d H:i:s');
    	$res=$this->saveShareCode($linkid,$code,$value,$time);
    	if($res){
    		echo json_encode($linkid);
    	}else{
    		echo json_encode('errors');
    	}
    }
    
    function showShare($linkid){
    	$this->addShareView($linkid);
    	$mode=$this->getMode($linkid);
    	$data=$this->getShare($linkid);
    	$code=$data[0]->code;
    	$time=$data[0]->time;
    	$view=$data[0]->view;
    	$value=$this->getShareValue($linkid);
    	$language=DB::select('select id,language from tool_lang');
    	return view('Compile/share',['code'=>$code,'mode'=>$mode,'time'=>$time,'view'=>$view,'values'=>$value,'language'=>$language]);
    }
    
    function getLanguage($id){
    	$language = DB::select('select * from tool_lang where id = ?', [$id]);
    	return $language;
    }
    
    function getTemplate($id){
    	$template = DB::select('select * from tool_temp where id = ?',[$id]);
    	return $template;
    }
    
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
    
    function getShareCount(){
    	$count=DB::select('select count(id) as count from tool_share');
    	return $count[0]->count;
    }
    
    function getMode($linkid){
    	$value0=DB::select('select value from tool_share where linkid = ?',[$linkid]);
    	$value=$value0[0]->value;
    	$mode=DB::select('select mode from tool_lang where value = ?',[$value]);
    	return $mode[0]->mode;
    }
    
    function getShareValue($linkid){
    	$value0=DB::select('select value from tool_share where linkid = ?',[$linkid]);
    	return $value0[0]->value;
    }
    
    function getShare($linkid){
    	$code=DB::select('select code,time,view from tool_share where linkid = ?',[$linkid]);
    	return $code;
    }
    
    function addShareView($linkid){
    	$view0=DB::select('select view from tool_share where linkid = ?',[$linkid]);
    	$view=$view0[0]->view+1;
    	DB::update('update tool_share set view = ? where linkid = ?',[$view,$linkid]);
    }
    
    function saveCode($code,$value){
    	$id0=DB::select('select id from tool_lang where value = ?',[$value]);
    	$id=$id0[0]->id;
    	$time=date('Y-m-d H:i:s');
    	$res=DB::insert("insert into tool_code(id,code,type,time) values('',?,?,?)",[$code,$id,$time]);
    	return $res;
    }
    
    function saveShareCode($linkid,$code,$value,$time){
    	$res=DB::insert("insert into tool_share(id,linkid,code,value,time,view) values('',?,?,?,?,0)",[$linkid,$code,$value,$time]);
    	return $res;
    }
}