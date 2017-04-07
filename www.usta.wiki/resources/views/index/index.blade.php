@extends('layout/main')

@section('title','首页')

@section('nav_li')
	@foreach($courses as $key=>$course)
	<li>
		<a href="{{ URL::action('CourseController@show',['course'=>$course->url]) }}">
			<i class="fa fa-sitemap"></i> <span class="nav-label">{{ $course->name }} 教程</span>
		</a>
	</li>
	@endforeach

@endsection

@section('body')
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

					<a href="{{ URL::action('CourseController@show',['course'=>$course->url]) }}">

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
@endsection