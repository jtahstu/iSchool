<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8" />
		<title> iTool - <?php echo $config['title']; ?> </title>
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta name="Keywords" content="<?php echo $config['keyword']; ?>" />
		<meta name="Description" content="<?php echo $config['des']; ?>" />
		<meta name="author" content="jtahstu" />
		<link rel="icon" href="<?php echo $config['icon']; ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/login.css')); ?>" />
		<style>
			body{height:100%;background:#16a085;overflow:hidden}
			canvas{z-index:-1;position:absolute}
		</style>
	</head>

	<body>
		<dl class="admin_login">
			<dt>
			  <strong>iTool管理系统</strong>
			  <em>iTool Management System</em>
			 </dt>
			<dd class="user_icon">
				<input placeholder="账号" class="login_txtbx" type="text" id="name">
			</dd>
			<dd class="pwd_icon">
				<input placeholder="密码" class="login_txtbx" type="password" id="pass">
			</dd>
			<dd>
				<input value="立即登陆" class="submit_btn" type="button" id="login">
			</dd>
		</dl>
		<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="<?php echo e(asset('public/js/jQuery.md5.js')); ?>"></script>
		<script src="<?php echo e(asset('public/js/Particleground.js')); ?>"></script>
		<script>
			$(document).ready(function() {
				$('body').particleground({
					dotColor: '#5cbdaa',
					lineColor: '#5cbdaa'
				});
				$('#login').click(function(){
					var name=$('#name').val();
					var pass=$('#pass').val();
					window.location.href='<?php echo e(URL::to('/admin')); ?>?user=root&pass='+$.md5(pass);
				});
			});
		</script>
	</body>
</html>
