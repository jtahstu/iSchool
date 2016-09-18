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
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/tool.css')}}" />
		<style type="text/css">
			.center,table tr th,#paginate,#paginate2,#compile-list-title{
				text-align: center;
			}
			#main{
				margin-top: 85px;
				padding-left: 20px;
				padding-left: 20px;
			}
			#valign{
				vertical-align:middle;
			}
		</style>
	</head>

	<body>
		@include('Compile.nav')
		<div class="col-md-1"></div>
		<div id="main" class="col-md-10">
			<h2 id="compile-list-title">代码分享归档</h2>
			<br />
			<table class="table table-bordered table-hover table-condensed">
				<tr>
					<th class="col-md-1">ID</th>
					<th class="col-md-6">Code</th>
					<th class="col-md-1">Language</th>
					<th class="col-md-1">Time</th>
					<th class="col-md-1">View</th>
				</tr>
				@foreach ($list as $rec)
				<tr class="list">
					<td class="center" id="valign">
						{{$rec->id}}
					</td>
					<td>
						<a href="{{URL::to('/share')}}/{{$rec->linkid}}" target="_blank">
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
			<div id="paginate2">
				{!! $list->render() !!}
			</div>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-12" style="padding: 0;">
			@include('Compile.footer')
		</div>
		<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</body>

</html>