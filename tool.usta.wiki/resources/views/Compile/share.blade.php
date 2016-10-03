<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="UTF-8" />
		<title>
			iTool - 代码分享
		</title>
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta name="Keywords" content="" />
		<meta name="Description" content="" />
		<meta name="author" content="jtahstu" />
		<link rel="icon" href="http://cdn.jtahstu.com/editor.ico" />
		<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/header.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/tool.css')}}" />
		<style>
			#compile-editor-div{margin-top:20px}
			#compile-lang{font-size:24px;font-weight:bold}
			#compile-view,#compile-time{color:red}
			#compile-share-title{margin:20px 0;text-align:center;font-size:28px;margin-left:-100px;color:#1a5cc8}
		</style>
	</head>

	<body>
		@include('Compile.header')
		<div class="">
			<div class="container">
				<h2 id="compile-share-title">
						<span id="compile-title">{{$title}}</span>
				</h2>
				<div id="compile-lang" align="center">
					浏览量：<span id="compile-view">{{$view}}</span>&nbsp;&nbsp;&nbsp; 修改时间：<span id="compile-time">{{$time}}</span>
					<button type="button" class="btn btn-success col-md-offset-1" id="compile-share"><i class="glyphicon glyphicon-share"></i>&nbsp;Share Again</button>
				</div>
				<div class="" id="compile-editor-div">
					<div id="compile-editor" name="" class=" form-control">{{$code}}</div>
				</div>
				<div id="tishi"></div>

			</div>

		</div>
		@include('Compile.footer')
		<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="http://cdn.bootcss.com/ace/1.2.4/ace.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://cdn.bootcss.com/ace/1.2.4/ext-language_tools.js"></script>
		<script src="http://cdn.bootcss.com/ace/1.2.4/ext-old_ie.js"></script>
		<script src="http://cdn.bootcss.com/ace/1.2.4/theme-monokai.js"></script>
		<?php if(isset($_GET['h'])){$editorHeight=$_GET['h'];}else{$editorHeight=600;}?>
		<script>
			$('#compile-editor').height(<?php echo $editorHeight;?>);
			require("ace/ext/old_ie");
			ace.require("ace/ext/language_tools");
			var editor = ace.edit("compile-editor");
			editor.$blockScrolling = Infinity;
			editor.setFontSize(14);
			editor.session.setMode("ace/mode/{{$mode}}");
			editor.setOptions({
				enableBasicAutocompletion: true,
				enableSnippets: true,
				enableLiveAutocompletion: true
			});
			//			editor.setShowInvisibles(true);
			editor.setTheme("ace/theme/monokai");
			//              var code= $('#code').val();
			$(function() {
				$("#compile-share").click(function() {
					var code = editor.getValue();
					var value = {{$values}};
					$.ajax({
						type: "post",
						url: "{{URL::to('share')}}",
						data: {
							'code': code,
							'value': value
						},
						dataType: 'json',
						success: function(msg) {
							$("#tishi").html("<div class='alert alert-success' style='text-align: center;margin-top: 10px;'>分享成功，链接为 <b>{{URL::to('share')}}/" + msg + "</b></div>");
						}
					});
				});
			});
		</script>
	</body>

</html>