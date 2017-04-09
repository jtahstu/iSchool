@extends('layout/main')

@section('title',$detail['title'])

@section('head')

@endsection

@section('nav_li')

    <li class="active">
        <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">{{ $course['name'] }} 教程</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">

            @foreach($nav_lis as $key=>$li)
                <li>
                    <a href="{{ URL::action('CourseController@show',['course'=>$course->url,'ware'=>$li['url']]) }}">
                        <i class="fa fa-file-text"></i> <span class="nav-label">{{ $li['title'] }}</span>
                    </a>

                </li>
            @endforeach

        </ul>
    </li>

@endsection

@section('body')
<div class="wrapper wrapper-content  animated fadeInRight article">
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<div class="ibox">
				<div class="ibox-content">
					<div class="article-intro" id="content">
						{!! $detail['content'] !!}
                        <br>
                        <div class="col-lg-12">

                            @if($link_ware['pre_course']['title'])
                                <div class="pull-left">
                                    <a href="{{ URL::action('CourseController@show',['course'=>$course->url,'ware'=>$link_ware['pre_course']['url']]) }}">
                                        <button class="btn btn-primary btn-rounded">上一篇：{{ $link_ware['pre_course']['title'] }}</button>
                                    </a>
                                </div>
                            @endif

                            @if($link_ware['next_course']['title'])
                                <div class="pull-right">
                                    <a href="{{ URL::action('CourseController@show',['course'=>$course->url,'ware'=>$link_ware['next_course']['url']]) }}">
                                        <button class="btn btn-primary btn-rounded">下一篇：{{ $link_ware['next_course']['title'] }}</button>
                                    </a>
                                </div>
                            @endif

                        </div>
                        <br>
					</div>
				</div>
			</div>
		</div>
	</div>

	@endsection
