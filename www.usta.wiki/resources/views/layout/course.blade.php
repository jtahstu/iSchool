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
    {{--<link href="{{asset('public/css/cai.css')}}" rel="stylesheet">--}}
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

                <li>
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">更多精彩</span> <span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="/itool">
                                <i class="fa fa-code"></i> iTool代码编辑器
                            </a>
                        </li>
                        <li>
                            <a href="/timeline">
                                <i class="fa fa-git"></i> iSchool时光机
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
                                <img alt="image" class="img-circle head_pic" src="{{ \App\Http\Controllers\Tool::get_user_head_pic() }}" width="30px" />
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

        <div class="wrapper animated fadeInDown" style="margin-top: 30px;">

            <div class="row">
                <div class="col-lg-12">

                    <div class="ibox product-detail">

                        <div class="ibox-title">
                            <h5>{{ $course_main['course']['name'] }}</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <div class="row">

                                <div class="col-md-4 text-center">
                                    <div class="product-images" style="vertical-align:middle;display: table-cell;text-align:center;" id="course-thumb">
                                        <img src="<?php echo $course_main['course']['logo'] ? $course_main['course']['logo'] : 'public/img/logo/a41def31e94869ced7de969c6a28bdf1.jpg'; ?>" style="max-height: 300px;">
                                    </div>

                                </div>
                                <div class="col-md-8" id="course-introduce">
                                    <h2 class="font-bold m-b-xs">
                                        {{ $course_main['course']['name'] }}
                                    </h2>
                                    <hr>
                                    <div class="text-muted col-md-12">
                                        <div class="col-md-10 col-md-offset-1">
                                        <table class="table table-bordered text-center">
                                            <tbody>
                                                <tr>
                                                    <td>课程介绍</td>
                                                    <td>{{ $course_main['course']['introduce'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>学习人数</td>
                                                    <td>{{ $course_main['learn_num'] }} 人</td>
                                                </tr>
                                                <tr>
                                                    <td>课程评分</td>
                                                    <td>{{ $course_main['avg_score'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>最后更新</td>
                                                    <td>{{ \App\Http\Controllers\Tool::datetime_to_YmdHi($course_main['course']['updated_at']) }}</td>
                                                </tr>
                                                @if(\App\Http\Controllers\Tool::isLogin())
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        @if($course_main['learn_status']==0)
                                                            <button class="btn btn-primary btn-sm btn-outline" onclick="study_course()">
                                                                加入学习
                                                            </button>
                                                        @else
                                                            <button class="btn btn-success btn-sm btn-outline">
                                                                继续学习
                                                            </button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                    @endif
                                            </tbody>
                                        </table>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>


            </div>
        </div>
        <div class="wrapper" >
            <div class="row">
                <div class="col-md-8">
                    <div class="ibox float-e-margins col-md-12 animated fadeInLeft">
                        <div class="ibox-title">
                            <h5>课程详情</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content col-md-12">
                            @yield('body')
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="ibox float-e-margins col-md-12 animated fadeInRight">
                        <div class="ibox-title">
                            <h5>讲师提示</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content col-md-12">
                            <img src="{{ $course_main['teacher']['head_pic'] }}" alt="" class="img-circle head_pic" style="width: 30px;">
                            &nbsp;
                            {{ $course_main['teacher']['name'] }}
                            <hr>
                            <div class="">
                                <div class="m-t-md">
                                    <h4>课程须知</h4>
                                    {{ $course_main['course']['notice'] }}
                                </div>
                                <div class="m-t-md">
                                    <h4>老师告诉你能学到什么？</h4>
                                    {{ $course_main['course']['reward'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @include('part.foot')
</div>

    <script>
        $(function () {
            var h = $('#course-introduce').outerHeight(true);
            $('#course-thumb').height(h)
        })
    </script>
</body>

</html>
