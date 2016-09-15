<!DOCTYPE html>
<html>

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
		<link href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" />
		<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
		<style>
			#compile-editor {
				width: 700px;
				height: 600px;
				font-size: 15px;
				font-family: "console";
				margin: 20px;
			}
			
			#compile-output {
				margin: 20px;
				height: 600px;
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
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div id="compile-editor" class="form-control col-md-6">@yield('content')</div>
			<div class="col-md-1" id="compile-runbox" align="center">
				<select name="" id="compile-editor-select" class="form-control">
					<option value="@yield('value')">@yield('language')</option>
				</select>
				<button type="button" class="btn btn-success" id="compile-run"><i class="glyphicon glyphicon-play"></i>&nbsp;&nbsp;运行一下</button>
			</div>
			<div class="col-md-5">
				<textarea name="" id="compile-output" class=" form-control" rows="20"></textarea>
			</div>
		</div>
		<div class="col-md-1"></div>
		<script src="http://cdn.bootcss.com/ace/1.2.5/ace.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://cdn.jtahstu.com/ace/theme/monokai.js" type="text/javascript" charset="utf-8"></script>
		<script>
			require("ace/ext/old_ie");
			ace.require("ace/ext/language_tools");
			var editor = ace.edit("compile-editor");
			editor.setTheme("ace/theme/monokai");
			editor.session.setMode("ace/mode/c_cpp");
			editor.setOptions({
				enableBasicAutocompletion: true,
				enableSnippets: true,
				enableLiveAutocompletion: false
			});
			
			$("#compile-output").val(' ');
			//              var code= $('#code').val();
			//				editor.setValue("/*\n\tDate: " + new Date() + "\n\tAuthor: Programmer \n*/\n" + value);
			$(function() {
				$("#compile-run").click(function() {
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