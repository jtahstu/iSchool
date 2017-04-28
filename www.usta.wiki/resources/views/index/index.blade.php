@extends('layout/main')

@section('title','首页')

@section('nav_li')
    @foreach($courses as $key=>$course)
        @if($course->id>1 && $course->first==1)
        </ul>
        </li>
        @endif
        @if($course->first==1)
            <li>
                <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">{{ $course->type_des }}</span> <span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
        @endif
            <li>
                <a href="{{ URL::action('CourseController@show',['course'=>$course->url]) }}">
                    <i class="fa fa-list-ul"></i> {{ $course->name }} 教程
                </a>
            </li>
    @endforeach
        </ul>
    </li>

@endsection

@section('body')
    <div class="wrapper wrapper-content">
        <?php $i = -1;$j = 0; ?>
        @foreach($courses as $course)

            @if($course->first==1)
                <?php $i++;$j = 0;?>
                @if($i>0)
                    </div>
                    @endif
                    <div class="alert alert-success col-lg-12" role="alert" style="font-size: 18px;"><i
                                class="fa fa-list-ul"></i> {{ $course->type_des }}</div>

                    <div class="row animated fadeInDown">
                @else
                    <?php $j++;?>
                    @if($j%4==0)
                        </div>
                        <div class="row animated fadeInDown">
                @endif

        @endif
        <div class="col-lg-3">
            <div class="contact-box center-version">

                <a href="{{ URL::action('CourseController@show',['course'=>$course->url]) }}">

                    <img alt="image" class="img-circle"
                         src="<?php echo $course->logo ? $course->logo : 'public/img/logo/a41def31e94869ced7de969c6a28bdf1.jpg'; ?>">

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