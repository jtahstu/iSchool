@extends('layout/admin-main')

@section('head')
    <style>
        th,td{
            text-align: center;
            vertical-align: middle !important;
        }
    </style>
    <script>
        $(document).ready(function() {

            $('.footable').footable();

        });

    </script>

@endsection

@section('body')
    <?php
//    var_dump($course_all);
    ?>
<div class="wrapper wrapper-content  animated fadeInRight article">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>课程 and 课件管理</h5>

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

                    <table class="footable table table-stripped toggle-arrow-tiny">
                        <thead>
                        <tr class="">

                            <th data-toggle="true" class="col-lg-1">ID</th>
                            <th class="col-lg-2">教程</th>
                            <th class="col-lg-5">简介</th>
                            <th class="col-lg-4">操作</th>
                            @foreach($course_all as $key=>$course)
                            @foreach($course['wares'] as $ware)
                                <th data-hide="all" class="col-lg-12"></th>
                            @endforeach
                            @endforeach

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($course_all as $key=>$course)
                            <tr>

                                <td> {{ $course['id'] }}</td>
                                <td>{{ $course['name'] }} 教程</td>
                                <td>{{ $course['des'] }}</td>
                                <td>
                                    <a type="button" class="btn btn-outline btn-danger btn-sm" href="">添加课件</a>
                                    &nbsp;&nbsp;
                                    <a type="button" class="btn btn-outline btn-primary btn-sm" href="/course-edit/{{ $course['id'] }}">编辑课程</a>
                                    &nbsp;&nbsp;
                                    <a type="button" class="btn btn-outline btn-danger btn-sm">删除课程</a>
                                </td>
                                <td>
                                    @foreach($course['wares'] as $ware)
                                        <div class="col-lg-12">
                                            <div class="col-lg-6">
                                                <a href="{{ URL::action('CourseController@show',['course'=>$course['url'],'ware'=>$ware['url']]) }}" target="_blank" title="{{ $ware['title'] }}">
                                                {{ $ware['title'] }}
                                                </a>
                                            </div>
                                            <div class="col-lg-6">
                                                <a type="button" class="btn btn-outline btn-primary btn-xs">编辑</a>
                                                &nbsp;&nbsp;
                                                <a type="button" class="btn btn-outline btn-danger btn-xs">删除</a>
                                            </div>
                                        </div>



                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5">
                                <ul class="pagination pull-right"></ul>
                            </td>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection