@extends('layout/course')

@section('title',$course_main['course']['name'])

@section('head')
    <script src="/public/js/prettify.js"></script>
    <link href="/public/css/prettify.css" rel="stylesheet">
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
            <li class="active">
                <a data-toggle="tab" href="#">
                    评论
                </a>
            </li>
            <li class="">
                <a href="/problem?course={{ $course_main['course']['url'] }}">
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
            <div id="tab-2" class="tab-pane active">
                <div class="panel-body">
                    <div class="ibox">
                        <div>
                            <textarea id="comment_c" cols="20" rows="4" class="form-control" placeholder="扯淡、吐槽、表扬、鼓励……想说啥就说啥！"></textarea>
                            <div class="pull-right m-t-md m-r-md tooltip-demo">
                                <button id="comment_s" class="btn btn-primary btn-outline btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="请登陆后再发表评论哦...">发表评论</button>
                            </div>
                        </div>
                    <div class="chat-discussion" style="margin: 60px 0 0 0;padding: 0;">
                        <?php $i = count($comments);$lc = ['沙发', '板凳', '地板', '地下室', '下水道']; ?>
                        @foreach($comments as $key=>$comment)
                            <?php $i--; ?>
                            <div class="chat-message left m-t-md">
                                <img class="message-avatar img-circle head_pic" src="{{ asset($comment->head_pic) }}"
                                     alt="大头照啦 ~\(≧▽≦)/~">
                                <div class="message">
                                    <a class="message-author" href="/u/{{ $comment->add_user_id }}"> {{ $comment->name }} </a>
                                    <span class="message-date">
                                            @if(\App\Http\Controllers\Tool::getLevel()==1)
                                            <a type="button" class="btn btn-outline btn-danger btn-xs" onclick="delComment({!! $comment->id.',\''. csrf_token().'\'' !!})">删除评论</a>
                                        @endif
                                                &nbsp;&nbsp;
                                        @if($comment->like_status==1)
                                        <a onclick="dislike({{ $comment->id }})">
                                            <i class="fa fa-thumbs-up fa-lg" style="color: #ff6d00;"></i>
                                        </a>
                                        @else
                                        <a onclick="like({{ $comment->id }})">
                                            <i class="fa fa-thumbs-o-up fa-lg"></i>
                                        </a>
                                        @endif
                                        &nbsp;{{ $comment->like }}&nbsp;&nbsp;
                                        @if($i<count($lc))
                                            <button class="btn btn-primary btn-outline btn-xs"> {{ $lc[$i] }} </button>
                                        @else
                                            <button class="btn btn-primary btn-outline btn-xs"> {{ $i+1 }}
                                                楼 </button>
                                        @endif

                                    </span>
                                    <span class="message-content" style="margin: 10px;">
											{!! $comment->comment !!}
                                    </span>
                                    <span class="message-foot" style="margin: 5px;">
                                        <small>
                                            时间：{{ \App\Http\Controllers\Tool::datetime_to_YmdHi($comment->created_at) }}
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            源自：
                                            @if($comment->type == 1)
                                            <a href="/show?course={{ $course_main['course']['url'] }}&ware={{ $comment->url }}" target="_blank">
                                                {{ $comment->title }}
                                            </a>
                                            @else
                                                课程评论
                                            @endif
                                        </small>

                                    </span>
                                </div>
                            </div>
                        @endforeach
                            <div class="text-center">
                                    <ul class="pagination">
                                        @for($i=1;$i<=$count/10+1;$i++)
                                                <?php $page= $class=($i==(isset($_GET['page'])?$_GET['page']:1))?"class='active'":""; ?>
                                            <li {!! $class !!}>
                                                <a href="/comment?course={{ $course_main['course']['url'] }}&page={{ $i }}">
                                                    {{ $i }}
                                                </a>
                                            </li>
                                        @endfor
                                    </ul>
                            </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('#comment_c').val('');
            $('pre').addClass('prettyprint lang-js').attr('style', 'overflow:auto;font-family:consola;');
            window.prettyPrint && prettyPrint();

            $('#comment_s').click(function () {
                var comment = $('#comment_c').val();

                $.ajax({
                    type: "post",
                    data: {'comment': comment,'course_id': '{{ $course_main['course']['id'] }}' , 'type':2 , '_token': '{!! csrf_token() !!}'},
                    url: "/comment",
                    success: function (data) {
                        if (data.status == 1) {
                            swal({
                                title: data.msg,
                                type: "success",
                                confirmButtonColor: "#30B593"
                            });
                            //2秒后页面跳转
                            setTimeout('location.reload()', 1500);
                        } else {
                            swal({
                                title: data.msg,
                                type: "error",
                                confirmButtonColor: "#F3AE56"
                            });
                        }

                    }
                })
            });
        })

        function like(comment_id) {
            dolike('/like',1,comment_id,'{!! csrf_token() !!}')
        }

        function dislike(comment_id) {
            dolike('/dislike',1,comment_id,'{!! csrf_token() !!}');
        }

    </script>
@endsection
