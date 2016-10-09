<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		@include('Compile.head')
		<style>
			#compile-editor-div{margin-top:20px}
			#compile-output{margin:20px 0 50px 0;min-height:300px}
			#compile-lang{margin-top:20px;font-size:24px;font-weight:bold}
			#compile-lang span{color:red}
			#compile-share-title{width:100%;margin:10px 0 10px 0}
		</style>
	</head>

	<body>
		@if(isset($_GET['m']))
			@include('Mobile.header')
		@else
			@include('Compile.header')
		@endif
		<div class="">
			<div class="container">
				<div id="compile-lang" align="center">
					{{$config['editorTitle']}}
					<span id=""> @yield('lang') </span>
					<button type="button" class="btn btn-success col-md-offset-2" id="compile-run">
					<i class="glyphicon glyphicon-play"></i>&nbsp;运行
					</button>
					<button type="button" class="btn btn-info" id="compile-share">
					<i class="glyphicon glyphicon-share"></i>&nbsp;分享
					</button>
					<button type="button" class="btn btn-success" id="compile-share-again">
					<i class="glyphicon glyphicon-share"></i>&nbsp;确认分享
					</button>
				</div>
				<div class="col-md-8 col-md-offset-2" id="compile-share-title">
					<input type="text" class="form-control" id="compile-share-title-input" placeholder="请输入标题...">
				</div>
				<div class="" id="compile-editor-div">
					<div id="compile-editor" name="" class=" form-control">@yield('content')</div>
				</div>
				<div id="tishi"></div>
				<div class="">
					<textarea name="" id="compile-output" class="form-control"></textarea>
				</div>
			</div>
		</div>
		@if(isset($_GET['m']))
			@include('Mobile.footer')
		@else
			@include('Compile.footer')
		@endif
		<script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="http://cdn.bootcss.com/ace/1.2.4/ace.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://cdn.bootcss.com/ace/1.2.4/ext-language_tools.js"></script>
		<script src="http://cdn.bootcss.com/ace/1.2.4/ext-old_ie.js"></script>
		<script src="http://cdn.bootcss.com/ace/1.2.4/theme-{{$config['editorTheme']}}.js"></script>
		<?php
			if (isset($_GET['h'])) $editorHeight = $_GET['h'];
			else $editorHeight = $config['editorHeight'];
		?>
		<script>
			$('#compile-editor').height(<?php echo $editorHeight; ?>);
			require("ace/ext/old_ie");
			ace.require("ace/ext/language_tools");
			var editor = ace.edit("compile-editor");
			editor.$blockScrolling = Infinity;
			editor.setFontSize(14);
			editor.session.setMode("ace/mode/@yield('mode')");
			editor.setOptions({
				enableBasicAutocompletion: true,
				enableSnippets: true,
				enableLiveAutocompletion: true
			});
			//editor.setShowInvisibles(true);
			editor.setTheme("ace/theme/{{$config['editorTheme']}}");
			$("#compile-output").val(' ');
			//var code= $('#code').val();
			$(function() {
				$("#compile-run").click(function() {
					layer.ready(function() {
						layer.msg("玩命运行中  <(＾－＾)>");
					});
					$("#compile-output").val('程序正在提交...');
					var code = editor.getValue();
					var value = @yield('value');
					$.ajax({
						type: "post",
						url: "{{URL::to('compiles')}}",
						data: {
							'code': code,
							'language': value
						},
						dataType: 'json',
						success: function(msg) {
							layer.ready(function() {
								layer.msg("结果出来啦  (*＾-＾*)");
							});
							$("#compile-output").val(msg);
						},
						error:function(){
							layer.ready(function() {
								layer.msg("运行发生错误 ╭∩╮(︶︿︶)╭∩╮");
							});
						}
					});
				});
				$("#compile-share-title").hide();
				$("#compile-share-again").hide();
				$("#compile-share").click(function(){
					$("#compile-share").hide('2000');
					$("#compile-share-again").show('4000');
					$("#compile-share-title").show('4000');
					
				});
				$("#compile-share-again").click(function() {
					var title=$("#compile-share-title-input").val();
//					alert(title);
					var code = editor.getValue();
					var value = @yield('value');
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
							layer.ready(function() {
								layer.msg("分享成功，赶紧复制链接分享给你的小伙伴吧  (*＾-＾*)");
							});
							$("#tishi").html("<div class='alert alert-success' style='text-align: center;margin-top: 10px;'>分享成功，链接为 <b>{{URL::to('share')}}/" + msg + "</b></div>");
						},
						error:function(){
							layer.ready(function() {
								layer.msg("啊哦，分享失败了，再试一次吧  (*＾-＾*)");
							});
						}
					});
				});
			});
		</script>
	</body>

</html>