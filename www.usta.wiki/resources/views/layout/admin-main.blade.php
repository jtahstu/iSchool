<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8">
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta name="Keywords" content="教程,HTML,CSS,JS,PHP,C,C++,Java,Python,MySQL,Redis" />
		<meta name="Description" content="Jin Tao同学的毕业设计，一个教程网站" />
		<meta name="author" content="jtahstu" />

		<title>后台管理 - iSchool</title>

        <link rel="icon" href="{{asset('public/favicon.ico')}}" />
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
        {{--表格--}}
        <link href="{{asset('public/css/footable.core.css')}}" rel="stylesheet">

        <script src="{{asset('public/js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
        {{--菜单--}}
        <script src="{{asset('public/js/jquery.metisMenu.js')}}"></script>
        <script src="{{asset('public/js/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('public/js/inspinia.js')}}"></script>
        <script src="{{asset('public/js/pace.min.js')}}"></script>
        {{--网站手写的js--}}
        <script src="{{asset('public/js/main.js')}}"></script>
        {{--弹窗--}}
        <link href="{{asset('public/css/sweetalert.css')}}" rel="stylesheet">
        <script src="{{asset('public/js/sweetalert.min.js')}}"></script>
        {{--文件上传--}}
        <link href="{{asset('public/css/jasny-bootstrap.min.css')}}" rel="stylesheet">
        <script src="{{asset('public/js/jasny-bootstrap.min.js')}}"></script>
        {{--表格--}}
        <script src="{{asset('public/js/footable.all.min.js')}}"></script>

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
						<img alt="image" class="img-circle" src="/public/img/tx/0.png" width="100px" />
						</span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->name }}</strong>&nbsp;<b class="caret"></b> </span>  </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li>
                                <a href="/setting">
                                    设置
                                </a>
                            </li>
                            <li>
                                <a href="/logout">
                                    退出
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="logo-element">
                        <a href="/admin">
                            iAdmin
                        </a>
                    </div>
                </li>
                <li>
                    <a href="/" target="_blank">
                        <i class="fa fa-th-large"></i><span class="nav-label">首页</span>
                    </a>
                </li>
                @if(\App\Http\Controllers\Tool::getLevel()==1)
                <li>
                    <a href="/admin">
                        <i class="fa fa-dashboard"></i><span class="nav-label">Dashboards</span>
                    </a>

                </li>
                    <li>
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">课程管理</span> <span
                                    class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse in">
                            <li>
                                <a href="/course-add">
                                    <i class="fa fa-plus"></i> 课程添加
                                </a>
                            </li>
                            <li>
                                <a href="/admin-course">
                                    <i class="fa fa-mortar-board"></i> 课程编辑
                                </a>
                            </li>
                        </ul>
                </li>
                @endif
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
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message"></span>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i><span class="label label-primary">8</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="mailbox.html">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> You have 16 messages <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="profile.html">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="grid_options.html">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="notifications.html">
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="/logout">
                            <i class="fa fa-sign-out"></i> 退出
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        @yield('body')
        @include('part.foot')
    </div>

</div>
</body>

</html>
