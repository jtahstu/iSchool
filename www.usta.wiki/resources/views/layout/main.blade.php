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
		<link href="{{asset('public/css/cai.css')}}" rel="stylesheet">
		<link href="{{asset('public/css/style.css')}}" rel="stylesheet">
		<link href="{{asset('public/css/main.css')}}" rel="stylesheet">
		
		<script src="{{asset('public/js/jquery-3.1.1.min.js')}}"></script>
		<script src="{{asset('public/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('public/js/jquery.metisMenu.js')}}"></script>
		<script src="{{asset('public/js/jquery.slimscroll.min.js')}}"></script>

		<script src="{{asset('public/js/inspinia.js')}}"></script>
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
						<img alt="image" class="img-container" src="{{asset('public/img/logo.png')}}" style=""/>
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
								<i class="fa fa-th-large"></i><span class="nav-label">Dashboards</span>
							</a>

						</li>

						@yield('nav_li')

					</ul>

				</div>
			</nav>

			<div id="page-wrapper" class="gray-bg">
				<div class="row border-bottom">
					<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
						<div class="navbar-header">
							<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
								<i class="fa fa-bars"></i>
							</a>
							<form role="search" class="navbar-form-custom" action="/search" type="get">
								<div class="form-group">
									<input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
								</div>
							</form>
						</div>
						<ul class="nav navbar-top-links navbar-right">
							<li>
								<span class="m-r-sm text-muted welcome-message"></span>
							</li>
						</ul>

					</nav>
				</div>
				@yield('body')
			</div>
			@include('part.foot')

		</div>
	</body>

</html>
