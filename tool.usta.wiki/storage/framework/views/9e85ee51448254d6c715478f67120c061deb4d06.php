<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<?php echo $__env->make('Compile.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<style>
			#compile-editor-div{margin:20px 0 50px 0;}
			#compile-lang{font-size:24px;font-weight:bold}
			#compile-view,#compile-time{color:red}
			#compile-share-title{margin:20px 0;text-align:center;font-size:28px;margin-left:-100px;color:#1a5cc8}
		</style>
	</head>

	<body>
		<?php if(isset($_GET['m'])): ?>
			<?php echo $__env->make('Mobile.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php else: ?>
			<?php echo $__env->make('Compile.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php endif; ?>
		<div class="">
			<div class="container">
				<h2 id="compile-share-title">
						<span id="compile-title"><?php echo e($title); ?></span>
				</h2>
				<div id="compile-lang" align="center">
					浏览量：<span id="compile-view"><?php echo e($view); ?></span>&nbsp;&nbsp;&nbsp; 修改时间：<span id="compile-time"><?php echo e($time); ?></span>
					<button type="button" class="btn btn-success col-md-offset-1" id="compile-share"><i class="glyphicon glyphicon-share"></i>&nbsp;Share Again</button>
				</div>
				<div class="" id="compile-editor-div">
					<div id="compile-editor" name="" class=" form-control"><?php echo e($code); ?></div>
				</div>
				<div id="tishi"></div>
			</div>

		</div>
		<?php if(isset($_GET['m'])): ?>
			<?php echo $__env->make('Mobile.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php else: ?>
			<?php echo $__env->make('Compile.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php endif; ?>
		<script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="http://cdn.bootcss.com/ace/1.2.4/ace.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://cdn.bootcss.com/ace/1.2.4/ext-language_tools.js"></script>
		<script src="http://cdn.bootcss.com/ace/1.2.4/ext-old_ie.js"></script>
		<script src="http://cdn.bootcss.com/ace/1.2.4/theme-<?php echo e($config['editorTheme']); ?>.js"></script>
		<?php if(isset($_GET['h'])){$editorHeight=$_GET['h'];}else{$editorHeight=$config['editorHeight'];}?>
		<script>
			$('#compile-editor').height(<?php echo $editorHeight;?>);
			require("ace/ext/old_ie");
			ace.require("ace/ext/language_tools");
			var editor = ace.edit("compile-editor");
			editor.$blockScrolling = Infinity;
			editor.setFontSize(14);
			editor.session.setMode("ace/mode/<?php echo e($mode); ?>");
			editor.setOptions({
				enableBasicAutocompletion: true,
				enableSnippets: true,
				enableLiveAutocompletion: true
			});
			//			editor.setShowInvisibles(true);
			editor.setTheme("ace/theme/<?php echo e($config['editorTheme']); ?>");
			//              var code= $('#code').val();
			$(function() {
				$("#compile-share").click(function() {
					var title=$('#compile-title').html();
					var code = editor.getValue();
					var value = <?php echo e($values); ?>;
					$.ajax({
						type: "post",
						url: "<?php echo e(URL::to('share')); ?>",
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
							$("#tishi").html("<div class='alert alert-success' style='text-align: center;margin-top: 10px;'>分享成功，链接为 <b><?php echo e(URL::to('share')); ?>/" + msg + "</b></div>");
						}
					});
				});
			});
		</script>
	</body>

</html>