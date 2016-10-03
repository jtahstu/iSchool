<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8" />
		<title>iTool - 在线代码编辑器</title>
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta name="Keywords" content="" />
		<meta name="Description" content="" />
		<meta name="author" content="jtahstu" />
		<link rel="icon" href="http://cdn.jtahstu.com/editor.ico" />
		<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/header.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/tool.css')}}" />
		<style type="text/css">
			#compile-editor-div{margin-top:20px}
			#compile-lang{margin-top:20px;font-size:24px;font-weight:bold}
			#compile-lang span{color:red}
			#compile-share-title{width:100%;margin:10px 0 10px 0}			
		</style>
	</head>

	<body>
		@include('Compile.header')
		<div class="">
			<div class="container">
				<div id="compile-lang" align="center">
					Language:
					<span id="">
						{{$lang}}
					</span>
					<button type="button" class="btn btn-success col-md-offset-2" id="compile-run" onclick=show()><i class="glyphicon glyphicon-play"></i>&nbsp;运行</button>
					<button type="button" class="btn btn-info" id="compile-share"><i class="glyphicon glyphicon-share"></i>&nbsp;分享</button>
					<button type="button" class="btn btn-success" id="compile-share-again">
					<i class="glyphicon glyphicon-share"></i>&nbsp;确认分享
					</button>
				</div>
				<div class="col-md-8 col-md-offset-2" id="compile-share-title">
					<input type="text" class="form-control" id="compile-share-title-input" placeholder="请输入标题...">
				</div>
				<div class="" id="compile-editor-div">
					<div id="compile-editor" name="" class=" form-control">{{$template}}</div>
				</div>
				<div id="tishi"></div>
				@include('Compile.changyan')
			</div>
			
		</div>

		@include('Compile.footer')
		<script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="http://cdn.bootcss.com/ace/1.2.4/ace.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://cdn.bootcss.com/ace/1.2.4/ext-language_tools.js"></script>
		<script src="http://cdn.bootcss.com/ace/1.2.4/ext-old_ie.js"></script>
		<script src="http://cdn.bootcss.com/ace/1.2.4/theme-monokai.js"></script>
		<?php if(isset($_GET['h'])){$editorHeight=$_GET['h'];}else{$editorHeight=600;}?>
		<script type="text/javascript">
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
			editor.setTheme("ace/theme/monokai");

			function show() {
				{
					code = editor.getValue();
					testwin = open("", "testwin", "status=no,menubar=yes,toolbar=no");
					testwin.document.open();
					testwin.document.write(code);
					testwin.document.close();
				}
			}
			$(function() {
				$("#compile-share-title").hide();
				$("#compile-share-again").hide();
				$("#compile-share").click(function(){
					$("#compile-share-title").show();
					$("#compile-share").hide();
					$("#compile-share-again").show();
				});
				$("#compile-share-again").click(function() {
					var title=$("#compile-share-title-input").val();
					var code = editor.getValue();
					var value = {{$value}};
					$.ajax({
						type: "post",
						url: "{{URL::to('share')}}",
						data: {
							'title':title,
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