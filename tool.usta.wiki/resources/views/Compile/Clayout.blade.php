<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="UTF-8" />
		<title>
			iTool - 在线代码编辑器
		</title>
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta name="Keywords" content="" />
		<meta name="Description" content="" />
		<meta name="author" content="jtahstu" />
		<link rel="icon" href="http://cdn.jtahstu.com/editor.ico" />
		<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/tool.css')}}" />
		<style>
			#compile-editor-div {
				margin-top: 20px;
			}
			
			#compile-output {
				margin: 20px 0 50px 0;
				min-height: 300px;
			}
			
			#compile-lang {
				margin-top: 70px;
				font-size: 24px;
				font-weight: bold;
			}
			
			#compile-lang span {
				color: red;
			}
		</style>
	</head>

	<body>
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
					<a class="navbar-brand" href="{{URL::to('/')}}">iTool</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li>
							<a href="http://www.usta.wiki" target="_blank">
								iSchool
							</a>
						</li>
						<li>
							<a href="#">代码清单</a>
						</li>
						<?php 
							$count=5;
							foreach ($language as $key => $value) {
							if($count>0){	
						?>
						<li>
							<a href="{{URL::to('compile')}}/<?php echo $value->id;?>">
								<?php  echo $value->language;?>
							</a>
						</li>
						<?php $count--;}}?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">其他在线工具 <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
							<?php 
								$count=0;
								foreach ($language as $key => $value) {
								if($count>4){	
							?>
						<li>
							<a href="{{URL::to('compile')}}/<?php echo $value->id;?>">
								<?php  echo $value->language;?>
							</a>
						</li>
						<?php }$count++;}?>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="">

			<div class="container">
				<div id="compile-lang" align="center">
					Language:
					<span id="">
						@yield('lang')
					</span>
					<button type="button" class="btn btn-success col-md-offset-2" id="compile-run"><i class="glyphicon glyphicon-play"></i>&nbsp;Run</button>
				</div>
				<div class="" id="compile-editor-div">
					<div id="compile-editor" name="" class=" form-control">@yield('content')</div>
				</div>
				<div class="">
					<textarea name="" id="compile-output" class="form-control"></textarea>
				</div>
			</div>

		</div>
		<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<!--<script src="//cdn.bootcss.com/semantic-ui/2.2.4/semantic.min.js"></script>-->
		<script src="http://cdn.bootcss.com/ace/1.2.4/ace.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://cdn.bootcss.com/ace/1.2.4/ext-language_tools.js"></script>
		<script src="http://cdn.bootcss.com/ace/1.2.4/ext-old_ie.js"></script>
		<script src="http://cdn.bootcss.com/ace/1.2.4/theme-monokai.js"></script>
		<!--<script src="http://cdn.jtahstu.com/ace/theme/monokai.js" type="text/javascript" charset="utf-8"></script>-->
		<script>
			$('#compile-editor').height(600);
			require("ace/ext/old_ie");
			ace.require("ace/ext/language_tools");
			var editor = ace.edit("compile-editor");
			editor.$blockScrolling = Infinity;
			editor.setFontSize(16);
			editor.session.setMode("ace/mode/@yield('mode')");
			editor.setOptions({
				enableBasicAutocompletion: true,
				enableSnippets: true,
				enableLiveAutocompletion: true
			});
			//			editor.setShowInvisibles(true);
			editor.setTheme("ace/theme/monokai");
			$("#compile-output").val(' ');
			//              var code= $('#code').val();
			$(function() {
				$("#compile-run").click(function() {
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
							$("#compile-output").val(msg);
						}
					});
				});
			});
		</script>
		{!! Config::get('app.cnzz') !!}
	</body>

</html>