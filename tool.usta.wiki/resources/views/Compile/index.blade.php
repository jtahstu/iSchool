<!DOCTYPE html>
<html>

	<head>
		@include('Compile.head')
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/overhang.min.css')}}" />
		<link rel="stylesheet" href=" http://cdn.jtahstu.com/barrager.css">
		<link rel="stylesheet" type="text/css" href="//at.alicdn.com/t/font_1475409244_4673653.css" />
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/index.css')}}" />
	</head>

	<body>
		@if(isset($_GET['m']))
			@include('Mobile.header')
		@else
			@include('Compile.header')
		@endif
		<div class="">
			<div class="demo-wrapper">
				<div class="dashboard clearfix">
					<div class="col1 clearfix">
						<div class="big todos-thumb" data-page="random-page">
							<i class="icon iconfont">&#xe600;</i>
							<p>
								<a href="{{URL::to('compile/1')}}" target="_blank" title="在线编译、运行 C/C++ 代码 ">
									C/C++
								</a>
							</p>
						</div>
						<div class="small lock-thumb">
							<i class="icon iconfont">&#xe608;</i>
							<p>
								<a href="{{URL::to('compile/6')}}" target="_blank" title="在线编译、运行 C# 代码 ">
									C#
								</a>
							</p>
						</div>
						<div class="small last cpanel-thumb" data-page="random-page">
							<p>
								<a href="{{URL::to('compile/17')}}" target="_blank" title="在线编译、运行 Pescal 代码">
									Pescal
								</a>
							</p>
						</div>
						<div class="big notes-thumb" data-page="random-page">
							<i class="icon iconfont">&#xe601;</i>
							<p>
								<a href="{{URL::to('compile/4')}}" target="_blank" title="在线编译、运行 Java 代码">
									Java
								</a>
							</p>
						</div>
						<div class="small lock-thumb">
							<p>
								<a href="{{URL::to('compile/8')}}" target="_blank" title="在线编译、运行 Objective-C 代码">
									Objective-C
								</a>
							</p>
						</div>
						<div class="small last cpanel-thumb" data-page="random-page">
							<i class="icon iconfont">&#xe60a;</i>
							<p>
								<a href="{{URL::to('compile/9')}}" target="_blank" title="在线编译、运行 Swift 代码">
									Swift
								</a>
							</p>
						</div>
					</div>
					<div class="col2 clearfix">
						<div class="big organizer-thumb" data-page="random-page">
							<i class="icon iconfont">&#xe606;</i>
							<p>
								<a href="{{URL::to('compile/2')}}" target="_blank" title="在线编译、运行 HTML/CSS/JS 代码">
									HTML/CSS/JS
								</a>
							</p>
						</div>
						<div class="big news-thumb" data-page="random-page">
							<i class="icon iconfont">&#xe609;</i>
							<p>
								<a href="{{URL::to('compile/3')}}" target="_blank" title="在线编译、运行 PHP 代码">
									PHP
								</a>
							</p>
						</div>
						<div class="small calendar-thumb" data-page="random-page">
							<i class="icon iconfont">&#xe602;</i>
							<p>
								<a href="{{URL::to('compile/10')}}" target="_blank" title="在线编译、运行 Ruby 代码">
									Ruby
								</a>
							</p>
						</div>
						<div class="small last paint-thumb" data-page="random-page">
							<i class="icon iconfont">&#xe605;</i>
							<p>
								<a href="{{URL::to('compile/11')}}" target="_blank" title="在线编译、运行 Perl 代码">
									Perl
								</a>
							</p>
						</div>
						<div class="big weather-thumb" data-page="random-page">
							<i class="icon iconfont">&#xe607;</i>
							<p>
								<a href="{{URL::to('compile/14')}}" target="_blank" title="在线编译、运行 Node.js 代码">
									Node.js
								</a>
							</p>
						</div>
					</div>
					<div class="col3 clearfix">
						<div class="big photos-thumb" data-page="random-page">
							<i class="icon iconfont">&#xe603;</i>
							<p>
								<a href="{{URL::to('compile/5')}}" target="_blank" title="在线编译、运行 Python 代码">
									Python
								</a>
							</p>
						</div>
						<div class="small alarm-thumb" data-page="random-page">
							<i class="icon iconfont">&#xe604;</i>
							<p>
								<a href="{{URL::to('compile/13')}}" target="_blank" title="在线编译、运行 Go 代码">
									Go
								</a>
							</p>
						</div>
						<div class="small last favorites-thumb" data-page="random-page">
							<p>
								<a href="{{URL::to('compile/12')}}" target="_blank" title="在线编译、运行 Bash 代码">
									Bash
								</a>
							</p>

						</div>
						<div class="big games-thumb" data-page="random-page">
							<i class="icon iconfont">&#xe603;</i>
							<p>
								<a href="{{URL::to('compile/7')}}" target="_blank" title="在线编译、运行 Python3 代码">
									Python3
								</a>
							</p>

						</div>
						<div class="small git-thumb" data-page="random-page">
							<p>
								<a href="{{URL::to('compile/15')}}" target="_blank" title="在线编译、运行 Lua 代码">
									Lua
								</a>
							</p>
						</div>
						<div class="small last code-thumb" data-page="random-page">
							<p>
								<a href="{{URL::to('compile/16')}}" target="_blank" title="在线编译、运行 Scala 代码">
									Scala
								</a>
							</p>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
		@if(isset($_GET['m']))
			@include('Mobile.footer')
		@else
			@include('Compile.footer')
		@endif
		
		<script type="text/javascript" src="{{asset('/public/js/jquery-ui.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('/public/js/overhang.min.js')}}"></script>
		<script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src=" http://cdn.jtahstu.com/jquery.barrager.min.js"></script>
		<script type="text/javascript">$(function() {
	$('body').overhang({
		type: 'success',
		message: "{{$config['indexMessage']}}",
		duration: 5,
		upper: true,
	});
	var item = {
		img: "{{$config['indexBarragerImg']}}", //图片
		info: "{{$config['indexBarragerInfo']}}", //文字
		href: "{{$config['indexBarragerLink']}}", //链接
		speed: 6, //延迟,单位秒,默认6
		// bottom:70, //距离底部高度,单位px,默认随机
		color: '#fff', //颜色,默认白色
		old_ie_color: '#000000', //ie低版兼容色,不能与网页背景相同,默认黑色
	}
	$('body').barrager(item);
});</script>
	</body>

</html>