@extends('layout/course')

@section('title',$course_main['course']['name'])

@section('head')
    <style>
        th,td{
            vertical-align: middle !important;
        }
    </style>
@endsection

@section('body')

    <div class="tabs-container">
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#">
                    目录
                </a>
            </li>
            <li class="">
                <a href="/comment?course={{ $course_main['course']['name'] }}">
                    评论
                </a>
            </li>
            <li class="">
                <a href="/problem?course={{ $course_main['course']['name'] }}">
                    问答
                </a>
            </li>
            <li class="">
                <a href="/note?course={{ $course_main['course']['name'] }}">
                    笔记
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
                <div class="panel-body">

                    <table class="table table-hover col-md-12">
                        <tbody>
                            @foreach($wares as $key=>$ware)
                                <tr>
                                    <td>
                                        <a href="{{ URL::action('CourseController@show',['course'=>$course_main['course']['name'],'ware'=>$ware->url]) }}">
                                            <div style="margin-left: 30px;">{{ $ware->title }}</div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ URL::action('CourseController@show',['course'=>$course_main['course']['name'],'ware'=>$ware->url]) }}">
                                        <div class="pull-right" style="margin-right: 30px;">
                                        @if($ware->status==1)
                                            <button class="btn btn-xs btn-outline btn-success">继续学习</button>
                                        @else
                                            <button class="btn btn-xs btn-outline btn-primary">立即学习</button>
                                        @endif
                                        </div>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
