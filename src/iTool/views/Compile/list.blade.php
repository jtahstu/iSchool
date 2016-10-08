<!DOCTYPE html>
<html>

	<head>
		@include('Compile.head')
		<style type="text/css">
			#main table{font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;font-size: 14px;}
			.center,table tr th{text-align:center}
			#main{margin:20px 0;padding-left:20px;}
			#compile-list{min-height: 600px;}
			#valign{vertical-align:middle}
		</style>
	</head>

	<body>
		@if(isset($_GET['m']))
			@include('Mobile.header')
		@else
			@include('Compile.header')
		@endif
		<div class="col-md-1"></div>
		<div id="main" class="col-md-10">
			<div class="pull-right">
				{!! $list->render() !!}
			</div>
			<div id="compile-list">
			<table class="table table-bordered table-hover table-condensed">
				<tr>
					<th class="col-md-1">序号</th>
					<th class="col-md-1">标题</th>
					<th class="col-md-5">代码</th>
					<th class="col-md-1">编程语言</th>
					<th class="col-md-1">最后编辑时间</th>
					<th class="col-md-1">浏览次数</th>
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
							<?php
								$len=$config['listCodeLength'];
							    if(strlen($rec->code)>$len){
							    	$cutCode=substr($rec->code, 0 , $len).' ... ';
									echo htmlentities($cutCode);
							    }else{
							    	echo htmlentities($rec->code);
							    }
							?>
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
			@if(isset($_GET['m']))
				@include('Mobile.footer')
			@else
				@include('Compile.footer')
			@endif
		</div>
	</body>

</html>