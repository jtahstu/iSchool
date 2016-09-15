<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="UTF-8" />
		<title>
			在线代码编辑器
		</title>
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta name="Keywords" content="" />
		<meta name="Description" content="" />
		<meta name="author" content="jtahstu" />
		<link rel="icon" href="http://cdn.jtahstu.com/editor.ico" />
		<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<script src="http://cdn.bootcss.com/jquery/1.12.4/jquery.js"></script>
		<style>
			body {
				font-family: 'Ubuntu Mono', 'Consolas', 'source-code-pro','Monaco', 'Menlo', monospace !important;
			}
			
			#compile-editor-div {
				margin-top: 20px;
			}
			
			#compile-output {
				margin: 20px;
				min-height: 600px;
			}
			
			#compile-runbox {
				margin-top: 250px;
			}
			
			#compile-editor-select {
				margin-bottom: 20px;
			}
		</style>
	</head>

	<body>
		<div class="">

			<div class="col-md-12 col-sm-12">
				<div class="col-md-4" id="compile-editor-div">
					<div id="compile-editor" name="" class=" form-control">@yield('content')</div>
				</div>

				<div class="col-md-1" id="compile-runbox" align="center">
					<select name="" id="compile-editor-select" class="form-control">
						<option value="@yield('value')">@yield('language')</option>
					</select>
					<button type="button" class="btn btn-success" id="compile-run"><i class="glyphicon glyphicon-play"></i>&nbsp;&nbsp;运行一下</button>
				</div>
				<div class="col-md-4">
					<textarea name="" id="compile-output" class="form-control"></textarea>
				</div>
			</div>

		</div>
		<script src="http://cdn.bootcss.com/ace/1.2.4/ace.js" type="text/javascript" charset="utf-8"></script>
		<!--<script type="text/javascript" src="https://ioj.ahstu.cc/JudgeOnline/ace-builds/src/ace.js"></script>-->
		<script src="http://cdn.bootcss.com/ace/1.2.4/ext-language_tools.js"></script>
		<script src="http://cdn.bootcss.com/ace/1.2.4/ext-old_ie.js"></script>
		<script src="http://cdn.bootcss.com/ace/1.2.4/theme-monokai.js"></script>
		<!--<script src="http://cdn.jtahstu.com/ace/theme/monokai.js" type="text/javascript" charset="utf-8"></script>-->
		<script>
			$('#compile-editor').height(700);
			require("ace/ext/old_ie");
			ace.require("ace/ext/language_tools");
			var editor = ace.edit("compile-editor");
			editor.$blockScrolling = Infinity;
			editor.setFontSize(16);
			editor.session.setMode("ace/mode/c_cpp");
			editor.setOptions({
				enableBasicAutocompletion: true,
				enableSnippets: true,
				enableLiveAutocompletion: true
			});
			//			editor.setShowInvisibles(true);
			editor.setTheme("ace/theme/monokai");
			$("#compile-output").val(' ');
			//              var code= $('#code').val();
			//				editor.setValue("/*\n\tDate: " + new Date() + "\n\tAuthor: Programmer \n*/\n" + value);
			$(function() {
				$("#compile-run").click(function() {
					$("#compile-output").val('程序正在提交...');
					var code = editor.getValue();
					var value = $("#compile-editor-select").val();
					$.ajax({
						type: "post",
						url: "{{URL::to('compiles')}}",
						data: {
							'code': code,
							'language': value
						},
						dataType: 'json',
						headers: {
							'X-CSRF-TOKEN': '{{ csrf_token() }}'
						},
						success: function(msg) {
							$("#compile-output").val(msg);
						}
					});
				});
			});
		</script>
	</body>

</html>