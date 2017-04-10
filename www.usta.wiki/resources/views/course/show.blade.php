@extends('layout/main')

@section('title',$detail['title'])

@section('head')
    <script>
        $(function () {


        })
    </script>
@endsection

@section('nav_li')

    <li class="active">
        <a href="#"><i class="fa fa-list-ul"></i> <span class="nav-label">{{ $course['name'] }} 教程</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">

            @foreach($nav_lis as $key=>$li)
                @if($li['title']==$detail['title'])
                    <li class="active">
                @else
                    <li>
                @endif
                    <a href="{{ URL::action('CourseController@show',['course'=>$course->url,'ware'=>$li['url']]) }}">
                        <i class="fa fa-file-text"></i> {{ $li['title'] }}
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
                <div class="ibox-title">
                    <h5>{{ $detail['title'] }}</h5>
                    <div class="ibox-tools">
                        <i class="fa fa-eye"></i> {{ $detail['view'] }}
                        &nbsp;&nbsp;
                        <i class="fa fa-clock-o"></i> {{ date_format(date_create($detail['update_time']), 'Y-m-d H:i') }}
                        &nbsp;&nbsp;
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>


                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
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
