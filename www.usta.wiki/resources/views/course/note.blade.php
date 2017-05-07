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
                <a href="/course?course={{ $course_main['course']['url'] }}">
                    目录
                </a>
            </li>
            <li class="">
                <a href="/comment?course={{ $course_main['course']['url'] }}">
                    评论
                </a>
            </li>
            <li class="">
                <a href="/problem?course={{ $course_main['course']['url'] }}">
                    问答
                </a>
            </li>
            <li class="active">
                <a data-toggle="tab" href="#">
                    笔记
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="tab-4" class="tab-pane active">
                <div class="panel-body">
                    笔记
                    <pre>
                        {{ var_dump($course_main) }}
                    </pre>
                </div>
            </div>
        </div>
    </div>
@endsection
