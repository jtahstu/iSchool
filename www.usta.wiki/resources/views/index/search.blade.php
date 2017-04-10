@extends('layout/main')

@section('title','检索')

@section('nav_li')
    @foreach($courses as $key=>$course)
        <li>
            <a href="{{ URL::action('CourseController@show',['course'=>$course->url]) }}">
                <i class="fa fa-list-ul"></i> <span class="nav-label">{{ $course->name }} 教程</span>
            </a>
        </li>
    @endforeach

@endsection

@section('body')

    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Search Result</h5>

                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>


                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        @if(count($wares)==0)
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button><span>
                                    <h2>
                                        <i class="fa fa-frown-o fa-2x"></i>&nbsp;&nbsp;&nbsp;未检索到标题包含 <span class="text-navy">" {{ $words }} "</span> 的教程!
                                        </h2>
                                    </span>
                            </div>
                        @else
                            <h2>
                                {{ count($wares) }} results found for: <span class="text-navy">" {{ $words }} "</span>
                            </h2>

                            <div class="hr-line-dashed"></div>
                        @endif

                        <?php $i=1; ?>
                        @foreach($wares as $ware)
                        <div class="search-result">

                            <h3>
                                <a href="{{ URL::action('CourseController@show',['course'=>$ware['course']['url'],'ware'=>$ware['url']]) }}" target="_blank">{{ $i++ }}、{{ $ware['title'] }}</a></h3>
                            <a href="{{ URL::action('CourseController@show',['course'=>$ware['course']['url'],'ware'=>$ware['url']]) }}" target="_blank" class="search-link">{{ URL::action('CourseController@show',['course'=>$ware['course']['url'],'ware'=>$ware['url']]) }}</a>
                            <p>
                                {{ mb_substr(strip_tags($ware['content']),0,400) }}
                            </p>
                        </div>
                        <div class="hr-line-dashed"></div>
                        @endforeach
                    </div>
                </div>
            </div>
    @endsection