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
            <li>
                <a href="/course?course={{ $course_main['course']['name'] }}">
                    目录
                </a>
            </li>
            <li class="">
                <a href="/comment?course={{ $course_main['course']['name'] }}">
                    评论
                </a>
            </li>
            <li class="active">
                <a data-toggle="tab" href="#">
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
            <div id="tab-3" class="tab-pane active">
                <div class="panel-body">
                    问答
                    <pre>
                        {{ var_dump($course_main) }}
                    </pre>
                </div>
            </div>
        </div>
    </div>
@endsection