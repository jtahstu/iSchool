@extends('layout.admin-main')

@section('title','问答管理')

@section('head')
    <style>
        th,td{
            text-align: center;
            vertical-align: middle !important;
        }
    </style>
@endsection

@section('body')
    <div class="wrapper wrapper-content  animated fadeInRight article">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>问答管理</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content col-lg-12">

                        <table class="table table-bordered col-lg-12">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>课程ID</th>
                                <th>课件ID</th>
                                <th>提问</th>
                                <th>详细介绍</th>
                                <th>user_id</th>
                                <th>点赞数</th>
                                <th>时间</th>
                                {{--<th>操作</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($problems as $key=>$problem)
                                <tr>
                                    <td>{{ $problem->id }}</td>
                                    <td>{{ $problem->course_id }}</td>
                                    <td>{{ $problem->ware_id }}</td>
                                    <td>{{ $problem->title }}</td>
                                    <td>{{ $problem->problem }}</td>
                                    <td>{{ $problem->user_id }}</td>
                                    <td>{{ $problem->like }}</td>
                                    <td>{{ $problem->created_at }}</td>
                                    {{--<td>--}}
                                        {{--<a type="button" class="btn btn-outline btn-danger btn-sm" onclick="delNote({!! $note->id.',\''. csrf_token().'\'' !!})">删除笔记</a>--}}
                                    {{--</td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {!! $problems->links() !!}
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection