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
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/tool.css')}}" />
		<!--<link href="//cdn.bootcss.com/foundation/6.2.3/foundation.min.css" rel="stylesheet">-->
		<style type="text/css">
			body {
				padding-top: 70px;
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
		</div>
		<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
		<script type="text/javascript" src="{{asset('/public/js/jquery-ui.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('/public/js/overhang.min.js')}}"></script>
		<script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<!--<script src="//cdn.bootcss.com/foundation/6.2.3/foundation.min.js"></script>-->
		<script type="text/javascript">
			$(function() {
				$('body').overhang({
					type: 'success',
					message: '欢迎来到 iTool，墙裂推荐使用 火狐浏览器 或 谷歌浏览器 访问本站点',
					duration: 5,
					upper: true,
				});
			})
		</script>
		{!! Config::get('app.cnzz') !!}
	</body>

</html>