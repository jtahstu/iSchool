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
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/header.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/tool.css')}}" />
		<style type="text/css">
			#main table{font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;font-size: 14px;}
			.center,table tr th{text-align:center}
			#main{margin:20px 0;padding-left:20px;}
			#compile-list{min-height: 600px;}
			#valign{vertical-align:middle}
		</style>
	</head>

	<body>
		@include('Compile.header')
		<div class="col-md-1"></div>
		<div id="main" class="col-md-10">
			<div class="pull-right">
				{!! $list->render() !!}
			</div>
			<div id="compile-list">
			<table class="table table-bordered table-hover table-condensed">
				<tr>
					<th class="col-md-1">ID</th>
					<th class="col-md-1">Title</th>
					<th class="col-md-5">Code</th>
					<th class="col-md-1">Language</th>
					<th class="col-md-1">Time</th>
					<th class="col-md-1">View</th>
				</tr>
				@foreach ($list as $rec)
				<tr class="list">
					<td class="center" id="valign">
						{{$rec->id}}
					</td>
					<td class="center" id="valign">
						<a href="{{URL::to('/share')}}/{{$rec->linkid}}">
							{{$rec->title}}
						</a>
					</td>
					<td class="compile-list-code">
						<a href="{{URL::to('/share')}}/{{$rec->linkid}}">
							{{$rec->code}}
						</a>
					</td>
					<td class="center" id="valign">
						{{$valueLanguage[$rec->value]}}
					</td>
					<td class="center" id="valign">
						{{$rec->time}}
					</td>
					<td class="center" id="valign">
						{{$rec->view}}
					</td>
				</tr>
				@endforeach
			</table>
			</div>
			<div class="pull-right">
				{!! $list->render() !!}
			</div>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-12" style="padding: 0;">
			@include('Compile.footer')
		</div>
		<script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<!--<script src="//cdn.bootcss.com/jQuery.dotdotdot/1.7.4/jquery.dotdotdot.min.js"></script>
		<script type="text/javascript">
		$(function(){
			$(".compile-list-code").dotdotdot();
		});
			
		</script>-->
	</body>

</html>