@extends('layout/main')

@section('title','首页')

@section('body')
	<?php
//		var_dump($courses);
	?>
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
						<i class="fa fa-th-large"></i><span class="nav-label">Dashboards</span><span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level collapse">
						<li>
							<a href="index.html">
								Dashboard v.1
							</a>
						</li>
						<li>
							<a href="dashboard_2.html">
								Dashboard v.2
							</a>
						</li>
						<li>
							<a href="dashboard_3.html">
								Dashboard v.3
							</a>
						</li>
						<li>
							<a href="dashboard_4_1.html">
								Dashboard v.4
							</a>
						</li>
						<li>
							<a href="dashboard_5.html">
								Dashboard v.5
							</a>
						</li>
					</ul>
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
							<i class="fa fa-envelope"></i><span class="label label-warning">16</span>
						</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box">
									<a href="profile.html" class="pull-left">
										<img alt="image" class="img-circle" src="/public/img/a7.jpg">
									</a>
									<div class="media-body">
										<small class="pull-right">46h ago</small>
										<strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>.
										<br>
										<small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
									</div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box">
									<a href="profile.html" class="pull-left">
										<img alt="image" class="img-circle" src="/public/img/a4.jpg">
									</a>
									<div class="media-body ">
										<small class="pull-right text-navy">5h ago</small>
										<strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>.
										<br>
										<small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
									</div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box">
									<a href="profile.html" class="pull-left">
										<img alt="image" class="img-circle" src="/public/img/profile.jpg">
									</a>
									<div class="media-body ">
										<small class="pull-right">23h ago</small>
										<strong>Monica Smith</strong> love <strong>Kim Smith</strong>.
										<br>
										<small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
									</div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="text-center link-block">
									<a href="mailbox.html">
										<i class="fa fa-envelope"></i><strong>Read All Messages</strong>
									</a>
								</div>
							</li>
						</ul>
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
		<div class="wrapper wrapper-content">
            	<?php $i=-1; ?>
				@foreach($courses as $course)
					<?php
                        $i++;
                        if(($i%4==0&&$i>0))
                            echo '</div>';
                        if($i%4==0&&($i/4)%2==0)
                            echo '<div class="row animated fadeInRight">';
                        else if($i%4==0&&($i/4)%2==1)
                            echo '<div class="row animated fadeInLeft">';
						?>
				<div class="col-lg-3">
					<div class="contact-box center-version">

						<a href="{{ $course->url }}">

							<img alt="image" class="img-circle" src="/public/img/a.png">

							<h3 class="m-b-xs"><strong>{{ $course->name }}</strong></h3>

							<div class="">
								{{ $course->des }}
							</div>


						</a>
					</div>
				</div>
				@endforeach

			</div>
		</div>
		@include('part.foot')

	</div>
</div>
@endsection