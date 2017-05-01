<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8">
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta name="Keywords" content="{{ \App\Config::getConfig('keywords') }}" />
		<meta name="Description" content="{{ \App\Config::getConfig('description') }}" />
		<meta name="author" content="{{ \App\Config::getConfig('author') }}" />

		<title>@yield('title') - iSchool</title>

		<link rel="icon" href="{{ \App\Config::getConfig('icon') }}" />
		<link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{asset('public/css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
		{{--动画--}}
		<link href="{{asset('public/css/animate.css')}}" rel="stylesheet">
		{{--菜鸟教程css--}}
		<link href="{{asset('public/css/cai.css')}}" rel="stylesheet">
		{{--后台模板css--}}
		<link href="{{asset('public/css/style.css')}}" rel="stylesheet">
		{{--手写的css--}}
		<link href="{{asset('public/css/main.css')}}" rel="stylesheet">
		
		<script src="{{asset('public/js/jquery-3.1.1.min.js')}}"></script>
		<script src="{{asset('public/js/bootstrap.min.js')}}"></script>
		{{--菜单js--}}
		<script src="{{asset('public/js/jquery.metisMenu.js')}}"></script>
		<script src="{{asset('public/js/jquery.slimscroll.min.js')}}"></script>

		<script src="{{asset('public/js/inspinia.js')}}"></script>

		<link href="{{asset('public/css/sweetalert.css')}}" rel="stylesheet">
		<script src="{{asset('public/js/sweetalert.min.js')}}"></script>

		{{--手写的js--}}
		<script src="{{asset('public/js/main.js')}}"></script>

		@yield('head')


	</head>

	<body>


		<div id="wrapper">

			<nav class="navbar-default navbar-static-side" role="navigation">
				<div class="sidebar-collapse">
					<ul class="nav metismenu" id="side-menu">
						<li class="nav-header">
							<div class="dropdown profile-element forum-info">
						<span>
							<a href="/">
								<img alt="image" class="img-container logo" src="{{asset('public/img/logo.png')}}" style=""/>
							</a>
						</span>

							</div>
							<div class="logo-element">
								<a href="/">
									iSchool
								</a>
							</div>
						</li>

						<li>
							<a href="{{ URL::to('/') }}">
								<i class="fa fa-th-large"></i><span class="nav-label">首页导航</span>
							</a>

						</li>
						@yield('nav_li')
						<li>
							<a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">更多精彩</span> <span
										class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="/timeline">
										<i class="fa fa-git"> iSchool时光机</i>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>

			<div id="page-wrapper" class="gray-bg">
				<div class="row border-bottom">
					<nav class="navbar navbar-static-top " role="navigation" style="margin-bottom: 0">
						<div class="navbar-header">
							<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
								<i class="fa fa-bars"></i>
							</a>
							<form role="search" class="navbar-form-custom" action="/search" type="get">
								<div class="form-group">
									<input type="text" placeholder="Search for something ..." class="form-control" name="top-search" id="top-search">
								</div>
							</form>
						</div>
						<ul class="nav navbar-top-links navbar-right">
							@if(!Auth::check())
								<li><a href="{{ url('/login') }}">登录</a></li>
								<li><a href="{{ url('/register') }}">注册</a></li>
							@else
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
										<img alt="image" class="img-circle head_pic" src="{{ \App\Http\Controllers\Tool::get_user_head_pic() }}" width="30px" style="width: 30px;" />
										{{ \Auth::user()->name }} <span class="caret"></span>
									</a>

									<ul class="dropdown-menu" role="menu">
										<li><a href="{{ url('/setting') }}">
												<i class="fa fa-user"></i> 个人设置
											</a></li>
										<li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> 退出登录</a></li>
									</ul>
								</li>
								@if(\App\Http\Controllers\Tool::getLevel()==1)
									<li>
										<a href="/admin">
											<i class="fa fa-sign-in"></i> 管理后台
										</a>
									</li>
								@endif
							@endif

						</ul>

					</nav>
				</div>
				@yield('body')
			</div>
		@include('part.foot')
	</div>
	</body>

</html>
