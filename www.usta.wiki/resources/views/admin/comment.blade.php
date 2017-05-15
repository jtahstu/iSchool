@extends('layout.admin-main')

@section('title','评论管理')

@section('head')
    <style>
        th,td{
            /*text-align: center;*/
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
                    <h5>评论管理</h5>
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
                            <th>类型</th>
                            <th>评论</th>
                            <th>评论人</th>
                            <th>点赞数</th>
                            <th class="col-lg-1">时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $key=>$comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->type }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>{{ $comment->add_user_id }}</td>
                            <td>{{ $comment->like }}</td>
                            <td>{{ $comment->created_at }}</td>
                            <td>
                                <a type="button" class="btn btn-outline btn-danger btn-sm" onclick="delComment({!! $comment->id.',\''. csrf_token().'\'' !!})">删除评论</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--<pre>--}}
                        {{--{{ var_dump($comments[0]) }}--}}
                    {{--</pre>--}}
                    {!! $comments->links() !!}
                </div>
            </div>
        </div>

    </div>

    </div>

@endsection