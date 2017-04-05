<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8">
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta name="Keywords" content="教程,HTML,CSS,JS,PHP,C,C++,Java,Python,MySQL,Redis" />
		<meta name="Description" content="Jin Tao同学的毕业设计，一个教程网站" />
		<meta name="author" content="jtahstu" />
		
		<title>@yield('title') - iSchool</title>
		
		<link rel="icon" href="{{asset('public/favicon.ico')}}" />
		<link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{asset('public/css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
		<link href="{{asset('public/css/animate.css')}}" rel="stylesheet">
		<link href="{{asset('public/css/style.css')}}" rel="stylesheet">
		
		<script src="{{asset('public/js/jquery-3.1.1.min.js')}}"></script>
		<script src="{{asset('public/js/bootstrap.min.js')}}"></script>
	</head>

	<body>

		@yield('body')

	</body>

</html>
