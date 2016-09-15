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
    	$language=$this->getLanguage($id);
    	$template=$this->getTemplate($id);
//  	var_dump($template);
//		var_dump($id);
//		var_dump($language);
    	return view('Compile/editor',['value'=>$language[0]->value,'language'=>$language[0]->language,'template'=>$template[0]->template]);
    }
    
    function result(Request $request){
    	$data=Input::all();
    	$code=$data['code'];
    	$value=$data['language'];
    	$back=$this->getResult($code,$value);
    	$this->saveCode($code,$value);
    	echo json_encode(htmlspecialchars($back));
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
		return $return->output;
    	
    }
    
    function saveCode($code,$value){
    	$id0=DB::select('select id from tool_lang where value = ?',[$value]);
    	$id=$id0[0]->id;
    	$time=date('Y-m-d H:i:s');
    	$res=DB::insert("insert into tool_code(id,code,type,time) values('',?,?,?)",[$code,$id,$time]);
    	return $res;
    }
}