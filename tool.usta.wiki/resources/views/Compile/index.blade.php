<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8" />
		<title>
			在线代码编辑
		</title>
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta name="Keywords" content="" />
		<meta name="Description" content="" />
		<meta name="author" content="jtahstu" />
		<link rel="icon" href="http://cdn.jtahstu.com/editor.ico" />
		<link href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" />
		<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</head>

	<body>
		<div class="container">
			<table class="table table-bordered table-hover table-striped" style="margin: 50px;">
				<tr>
					<th>ID</th>
					<th>语言</th>
					<th>介绍</th>
				</tr>
				<?php foreach ($language as $key => $value) {?>
					<tr>
						<td>
							<?php echo  $value->id;?>
						</td>
						<td>
							<a href="{{URL::to('compile')}}/<?php echo $value->id;?>" target="_blank">
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
	</body>

</html>