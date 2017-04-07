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
        <link href="{{asset('public/css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('public/css/style.css')}}" rel="stylesheet">

        <script src="{{asset('public/js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>

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
						<img alt="image" class="img-circle" src="/public/img/profile_small.jpg" />
						</span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong> </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li>
                                <a href="profile.html">
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a href="contacts.html">
                                    Contacts
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="logo-element">
                        iSchool
                    </div>
                </li>
                <li>
                    <a href="index.html">
                        <i class="fa fa-th-large"></i><span class="nav-label">Dashboards</span>
                    </a>

                </li>
                <li>
                    <a href="layouts.html">
                        <i class="fa fa-diamond"></i><span class="nav-label">Layouts</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i><span class="nav-label">Graphs</span><span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="graph_flot.html">
                                Flot Charts
                            </a>
                        </li>
                        <li>
                            <a href="graph_morris.html">
                                Morris.js Charts
                            </a>
                        </li>
                    </ul>
                </li>

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
                    <form role="search" class="navbar-form-custom" action="search_results.html">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
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
                        <a href="login.html">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
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
