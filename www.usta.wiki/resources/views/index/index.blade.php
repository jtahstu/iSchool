@extends('layout/main')

@section('title','首页')

@section('body')
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
						<li>
							<a href="graph_rickshaw.html">
								Rickshaw Charts
							</a>
						</li>
						<li>
							<a href="graph_chartjs.html">
								Chart.js
							</a>
						</li>
						<li>
							<a href="graph_chartist.html">
								Chartist
							</a>
						</li>
						<li>
							<a href="c3.html">
								c3 charts
							</a>
						</li>
						<li>
							<a href="graph_peity.html">
								Peity Charts
							</a>
						</li>
						<li>
							<a href="graph_sparkline.html">
								Sparkline Charts
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
		<div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-lg-9">
				<h2>Contacts 2</h2>
				<ol class="breadcrumb">
					<li>
						<a href="index.html">
							Home
						</a>
					</li>
					<li>
						App Views
					</li>
					<li class="active">
						<strong>Contacts 2</strong>
					</li>
				</ol>
			</div>
		</div>
		<div class="wrapper wrapper-content animated fadeInRight">
			<div class="row">
				<div class="col-lg-3">
					<div class="contact-box center-version">

						<a href="profile.html">

							<img alt="image" class="img-circle" src="/public/img/a2.jpg">

							<h3 class="m-b-xs"><strong>John Smith</strong></h3>

							<div class="font-bold">
								Graphics designer
							</div>
							<address class="m-t-md">
							<strong>Twitter, Inc.</strong>
							<br>
							795 Folsom Ave, Suite 600
							<br>
							San Francisco, CA 94107
							<br>
							<abbr title="Phone">P:</abbr> (123) 456-7890
							</address>

						</a>
						

					</div>
				</div>
				<div class="col-lg-3">
					<div class="contact-box center-version">

						<a href="profile.html">

							<img alt="image" class="img-circle" src="/public/img/a1.jpg">

							<h3 class="m-b-xs"><strong>Alex Johnatan</strong></h3>

							<div class="font-bold">
								CEO
							</div>
							<address class="m-t-md">
							<strong>Twitter, Inc.</strong>
							<br>
							795 Folsom Ave, Suite 600
							<br>
							San Francisco, CA 94107
							<br>
							<abbr title="Phone">P:</abbr> (123) 456-7890
							</address>

						</a>
						

					</div>
				</div>
				<div class="col-lg-3">
					<div class="contact-box center-version">

						<a href="profile.html">

							<img alt="image" class="img-circle" src="/public/img/a3.jpg">

							<h3 class="m-b-xs"><strong>Monica Smith</strong></h3>

							<div class="font-bold">
								Marketing manager
							</div>
							<address class="m-t-md">
							<strong>Twitter, Inc.</strong>
							<br>
							795 Folsom Ave, Suite 600
							<br>
							San Francisco, CA 94107
							<br>
							<abbr title="Phone">P:</abbr> (123) 456-7890
							</address>

						</a>
						

					</div>
				</div>
				<div class="col-lg-3">
					<div class="contact-box center-version">

						<a href="profile.html">

							<img alt="image" class="img-circle" src="/public/img/a4.jpg">

							<h3 class="m-b-xs"><strong>Michael Zimber</strong></h3>

							<div class="font-bold">
								Sales manager
							</div>
							<address class="m-t-md">
							<strong>Twitter, Inc.</strong>
							<br>
							795 Folsom Ave, Suite 600
							<br>
							San Francisco, CA 94107
							<br>
							<abbr title="Phone">P:</abbr> (123) 456-7890
							</address>

						</a>
						

					</div>
				</div>
				<div class="col-lg-3">
					<div class="contact-box center-version">

						<a href="profile.html">

							<img alt="image" class="img-circle" src="/public/img/a5.jpg">

							<h3 class="m-b-xs"><strong>Sandra Smith</strong></h3>

							<div class="font-bold">
								Graphics designer
							</div>
							<address class="m-t-md">
							<strong>Twitter, Inc.</strong>
							<br>
							795 Folsom Ave, Suite 600
							<br>
							San Francisco, CA 94107
							<br>
							<abbr title="Phone">P:</abbr> (123) 456-7890
							</address>

						</a>
						
					</div>
				</div>

				<div class="col-lg-3">
					<div class="contact-box center-version">

						<a href="profile.html">

							<img alt="image" class="img-circle" src="/public/img/a6.jpg">

							<h3 class="m-b-xs"><strong>Janet Carton</strong></h3>

							<div class="font-bold">
								CFO
							</div>
							<address class="m-t-md">
							<strong>Twitter, Inc.</strong>
							<br>
							795 Folsom Ave, Suite 600
							<br>
							San Francisco, CA 94107
							<br>
							<abbr title="Phone">P:</abbr> (123) 456-7890
							</address>

						</a>
						
					</div>
				</div>

				<div class="col-lg-3">
					<div class="contact-box center-version">

						<a href="profile.html">

							<img alt="image" class="img-circle" src="/public/img/a1.jpg">

							<h3 class="m-b-xs"><strong>Alex Johnatan</strong></h3>

							<div class="font-bold">
								CEO
							</div>
							<address class="m-t-md">
							<strong>Twitter, Inc.</strong>
							<br>
							795 Folsom Ave, Suite 600
							<br>
							San Francisco, CA 94107
							<br>
							<abbr title="Phone">P:</abbr> (123) 456-7890
							</address>

						</a>
						
					</div>
				</div>

				<div class="col-lg-3">
					<div class="contact-box center-version">

						<a href="profile.html">

							<img alt="image" class="img-circle" src="/public/img/a7.jpg">

							<h3 class="m-b-xs"><strong>John Smith</strong></h3>

							<div class="font-bold">
								Graphics designer
							</div>
							<address class="m-t-md">
							<strong>Twitter, Inc.</strong>
							<br>
							795 Folsom Ave, Suite 600
							<br>
							San Francisco, CA 94107
							<br>
							<abbr title="Phone">P:</abbr> (123) 456-7890
							</address>

						</a>
						
					</div>
				</div>
				<div class="col-lg-3">
					<div class="contact-box center-version">

						<a href="profile.html">

							<img alt="image" class="img-circle" src="/public/img/a2.jpg">

							<h3 class="m-b-xs"><strong>John Smith</strong></h3>

							<div class="font-bold">
								Graphics designer
							</div>
							<address class="m-t-md">
							<strong>Twitter, Inc.</strong>
							<br>
							795 Folsom Ave, Suite 600
							<br>
							San Francisco, CA 94107
							<br>
							<abbr title="Phone">P:</abbr> (123) 456-7890
							</address>

						</a>
					
					</div>
				</div>
				<div class="col-lg-3">
					<div class="contact-box center-version">

						<a href="profile.html">

							<img alt="image" class="img-circle" src="/public/img/a1.jpg">

							<h3 class="m-b-xs"><strong>Alex Johnatan</strong></h3>

							<div class="font-bold">
								CEO
							</div>
							<address class="m-t-md">
							<strong>Twitter, Inc.</strong>
							<br>
							795 Folsom Ave, Suite 600
							<br>
							San Francisco, CA 94107
							<br>
							<abbr title="Phone">P:</abbr> (123) 456-7890
							</address>

						</a>
						
					</div>
				</div>
				<div class="col-lg-3">
					<div class="contact-box center-version">

						<a href="profile.html">

							<img alt="image" class="img-circle" src="/public/img/a3.jpg">

							<h3 class="m-b-xs"><strong>Monica Smith</strong></h3>

							<div class="font-bold">
								Marketing manager
							</div>
							<address class="m-t-md">
							<strong>Twitter, Inc.</strong>
							<br>
							795 Folsom Ave, Suite 600
							<br>
							San Francisco, CA 94107
							<br>
							<abbr title="Phone">P:</abbr> (123) 456-7890
							</address>

						</a>
						
					</div>
				</div>
				<div class="col-lg-3">
					<div class="contact-box center-version">

						<a href="profile.html">

							<img alt="image" class="img-circle" src="/public/img/a4.jpg">

							<h3 class="m-b-xs"><strong>Michael Zimber</strong></h3>

							<div class="font-bold">
								Sales manager
							</div>
							<address class="m-t-md">
							<strong>Twitter, Inc.</strong>
							<br>
							795 Folsom Ave, Suite 600
							<br>
							San Francisco, CA 94107
							<br>
							<abbr title="Phone">P:</abbr> (123) 456-7890
							</address>

						</a>
						

					</div>
				</div>

			</div>
		</div>
		@include('part.foot')

	</div>
</div>
@endsection