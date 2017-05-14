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
            <li class="active">
                <a data-toggle="tab" href="#">
                    问答
                </a>
            </li>
            <li class="">
                <a href="/note?course={{ $course_main['course']['url'] }}">
                    笔记
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="tab-3" class="tab-pane active">
                <div class="panel-body">
                    <div class="col-lg-12">
                        <div class="wrapper wrapper-content animated fadeInRight">
                            {{--显示问题开始--}}
                            @foreach($problems as $key=>$problem)
                            <div class="vote-item">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="vote-actions">
                                                @if($problem->like_status>0)
                                                 <a>
                                                <span style="color: red;">
                                                @else
                                                <a onclick="like_problem({{ $problem->id }})">
                                                <span>
                                                @endif
                                                    <i class="fa fa-chevron-up"> </i>
                                                </span>
                                            </a>
                                            <div>{{ $problem->like }}</div>
                                            @if($problem->like_status>0)
                                            <a onclick="dislike_problem({{ $problem->id }})">
                                                <span style="color: gray;" class="tooltip-demo"><i class="fa fa-chevron-down"> </i></span>
                                            </a>
                                                @endif
                                        </div>
                                        <a href="/problem-answer?id={{ $problem->id }}" class="vote-title">
                                            {{ $problem->problem }}
                                        </a>
                                        <div class="vote-info">
                                            <i class="fa fa-comments-o"></i> <a href="/problem-answer?id={{ $problem->id }}">Answers ({{ $problem->answer_count }})</a>
                                            <i class="fa fa-clock-o"></i> <a>{{ \App\Http\Controllers\Tool::datetime_to_YmdHi($problem->created_at) }}</a>
                                            <i class="fa fa-user"></i> <a href="/u/{{ $problem->user_id }}">{{ $problem->name }}</a>
                                        </div>

                                    </div>
                                    <div class="col-md-2 ">
                                        <div class="vote-icon">
                                            <img src="{{ $problem->head_pic }}" alt="{{ $problem->name }}" class="img-circle head_pic" width="50px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{--显示问题结束--}}

                            {{--分页开始--}}
                            <div class="text-center">
                                <ul class="pagination">
                                    @for($i=1;$i<=$count/10+1;$i++)
                                        <?php $page= $class=($i==(isset($_GET['page'])?$_GET['page']:1))?"class='active'":""; ?>
                                        <li {!! $class !!}>
                                            <a href="/problem?course={{ $course_main['course']['name'] }}&page={{ $i }}">
                                                {{ $i }}
                                            </a>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                            {{--分页结束--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function like_problem(problem_id) {
            dolike('/problem-like',2,problem_id);
        }
        
        function dislike_problem(problem_id) {
            dolike('/problem-dislike',2,problem_id);
        }

        function dolike(url,type,problem_id) {
            $.ajax({
                url: url,
                data: {'type':type ,'problem_id':problem_id , '_token': '{!! csrf_token() !!}'},
                type: "post",
                success: function(data) {
                    if(data.status == 1) {
                        swal({
                            title: data.msg,
                            type: "success",
                            confirmButtonColor: "#30B593"
                        });
                        setTimeout('location.reload()', 1500);
                    } else {
                        swal({
                            title: data.msg,
                            type: "error",
                            confirmButtonColor: "#F3AE56"
                        });
                    }
                }
            });
        }
    </script>
@endsection
