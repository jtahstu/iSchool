<!DOCTYPE html>
<html>

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
		<link href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/overhang.min.css')}}" />
		<link rel="stylesheet" href=" http://cdn.jtahstu.com/barrager.css">
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/tool.css')}}" />
	</head>

	<body style="padding-top: 90px;">
		@include('Compile.nav')
		<div class="container">
			<table class="table table-bordered table-hover table-striped">
				<tr>
					<th style="text-align: center;">ID</th>
					<th>语言</th>
					<th>介绍</th>
				</tr>
				<?php foreach ($language as $key => $value) {?>
				<tr>
					<td align="center">
						<?php echo  $value->id;?>
					</td>
					<td>
						<a href="{{URL::to('compile')}}/<?php echo $value->id;?>">
							<?php  echo $value->language." 在线工具";?>
						</a>
					</td>
					<td>
						<?php echo "在线编译、运行 ".$value->language." 代码";?>
					</td>
				</tr>
				<?php } ?>
			</table>
			@include('Compile.changyan')
		</div>
		@include('Compile.footer')
		<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
		<script type="text/javascript" src="{{asset('/public/js/jquery-ui.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('/public/js/overhang.min.js')}}"></script>
		<script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src=" http://cdn.jtahstu.com/jquery.barrager.min.js"></script>
		<script type="text/javascript">
			$(function() {
				$('body').overhang({
					type: 'success',
					message: '欢迎来到 iTool，墙裂推荐使用 火狐浏览器 或 谷歌浏览器 访问本站点',
					duration: 5,
					upper: true,
				});
				var item = {
					img: 'http://cdn.jtahstu.com/firefox.png', //图片 
					info: '下载火狐浏览器', //文字 
					href: 'http://www.firefox.com.cn/', //链接 
					speed: 6, //延迟,单位秒,默认6 
					// bottom:70, //距离底部高度,单位px,默认随机 
					color: '#fff', //颜色,默认白色 
					old_ie_color: '#000000', //ie低版兼容色,不能与网页背景相同,默认黑色 
				}
				$('body').barrager(item);
			});
		</script>
		{!! Config::get('app.cnzz') !!}
	</body>

</html>