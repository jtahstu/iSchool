@extends('layout/main')

@section('title',$detail['title'])

@section('head')
    <link href="/public/css/editormd.min.css" rel="stylesheet">
    <script src="/public/js/editormd/editormd.min.js"></script>
    {{--<script src="/public/js/prettify.js"></script>--}}
    {{--<link href="https://cdn.bootcss.com/prettify/r298/prettify.css" rel="stylesheet">--}}
    <style>
        .page-heading a:hover{
            color: #1AB394;
        }
    </style>
    <script>
        var Editor;

        $(function () {
//            $('pre').addClass('prettyprint lang-js').attr('style', 'overflow:auto;font-family:consola;');
//            window.prettyPrint && prettyPrint();

            Editor = editormd("editormd", {
                width: "100%",
                height: 350,
                toolbarIcons: function () {
                    return ["undo", "redo", "|", "bold", "del", "italic", "quote", "|", "h1", "h2", "h3", "h4", "h5", "h6", "|", "list-ul", "list-ol", "hr", "|", "clear", "preview"]
                },
                syncScrolling: "single",
                path: '/public/js/editormd/lib/',
                saveHTMLToTextarea: true,
                taskList: true,
                tocm: true,         // Using [TOCM]
                tex: true,                   // 开启科学公式TeX语言支持，默认关闭
                flowChart: true,             // 开启流程图支持，默认关闭
                sequenceDiagram: true,       // 开启时序/序列图支持，默认关闭,
            });

            $('#comment').click(function () {
                var comment = Editor.getHTML();
                var comment_code = $('#comment_code').val();

                $.ajax({
                    type: "post",
                    data: {'comment': comment, 'comment_code': comment_code, '_token': '{!! csrf_token() !!}'},
                    url: "/comment/<?php echo $detail['id'];?>",
                    success: function (data) {
                        if (data.status == 1) {
                            swal({
                                title: data.msg,
                                type: "success",
                                confirmButtonColor: "#30B593"
                            });
                            //2秒后页面跳转
                            setTimeout('location.reload()', 2000);
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
            $('#comment_code').val('');
//            $('#comment_link').click();
            $('#top-search').focus();

        })
    </script>
@endsection

@section('nav_li')

        <li class="active">
            <a href="#"><i class="fa fa-list-ul"></i> <span class="nav-label">{{ $course['name'] }}</span><span
                        class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">

                @foreach($nav_lis as $key=>$li)
                    @if($li['title']==$detail['title'])
                        <li class="active">
                    @else
                        <li>
                            @endif
                            <a href="{{ URL::action('CourseController@show',['course'=>$course->url,'ware'=>$li['url']]) }}">
                                <i class="fa fa-file-text"></i> {{ $li['title'] }}
                            </a>

                        </li>
                        @endforeach

            </ul>
        </li>

@endsection

@section('body')
    <div class="wrapper wrapper-content  animated fadeInRight article">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-11">
                <h2>{{ $detail['title'] }}</h2>
                <div class="pull-right">
                    <i class="fa fa-eye"></i> {{ $detail['view'] }}
                    &nbsp;&nbsp;
                    <i class="fa fa-clock-o"></i> {{ \App\Http\Controllers\Tool::datetime_to_YmdHi($detail['updated_at']) }}
                </div>
                <ol class="breadcrumb">
                    <li>
                        <a href="/">首页</a>
                    </li>
                    <li><a href="/course?course={{ $course['url'] }}">{{ $course['name'] }}</a></li>
                    <li class="active">{{ $detail['title'] }}</li>
                    @if(\App\Http\Controllers\Tool::getLevel()==1)
                        <li>
                            <a href="/course-ware-edit/{{ $detail['id'] }}" target="_blank">
                                <button class="btn btn-primary btn-outline btn-xs">编辑课件</button>
                            </a>
                            &nbsp;&nbsp;
                        </li>
                    @endif
                </ol>
            </div>
            <div class="col-lg-1">

            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="article-intro" id="content">
                            <div id="spider_content">
                                {!! $detail['content'] !!}
                            </div>
                            <br>
                            <div class="col-lg-12">

                                @if($link_ware['pre_course']['title'])
                                    <div class="pull-left">
                                        <a href="{{ URL::action('CourseController@show',['course'=>$course->url,'ware'=>$link_ware['pre_course']['url']]) }}">
                                            <button class="btn btn-primary btn-rounded">
                                                上一篇：{{ $link_ware['pre_course']['title'] }}</button>
                                        </a>
                                    </div>
                                @endif

                                @if($link_ware['next_course']['title'])
                                    <div class="pull-right">
                                        <a href="{{ URL::action('CourseController@show',['course'=>$course->url,'ware'=>$link_ware['next_course']['url']]) }}">
                                            <button class="btn btn-primary btn-rounded">
                                                下一篇：{{ $link_ware['next_course']['title'] }}</button>
                                        </a>
                                    </div>
                                @endif

                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="ibox">
                    <div class="ibox-content" style="border: 1px dashed;color: gray;padding: 16px;font-size: 14px;">
                        <ul>
                            <li style="color: #ff6d00;">请先登录 ~\(≧▽≦)/~，再发表评论 /(ㄒoㄒ)/~~</li>
                            <li>评论内容不要超过233个字符 (⊙o⊙)哦</li>
                            <li>请注意单词拼写，以及中英文排版，<a href="https://github.com/sparanoid/chinese-copywriting-guidelines"
                                                   target="_blank">参考此页</a></li>
                            {{--<li>支持 Markdown 格式, <strong>**粗体**</strong>、<code>```代码```</code>, 更多语法请见这里 <a--}}
                                        {{--href="http://www.markdown.cn/"--}}
                                        {{--target="_blank">Markdown 语法</a></li>--}}
                            {{--<li>目前MarkDown在添加代码时，预览会有点问题，但不影响评论后的效果 ╮(╯▽╰)╭哎</li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-b-lg">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1">评论</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-2">问答</a></li>
                        <li><a data-toggle="tab" href="#tab-3">笔记</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                                <div class="ibox">
                                    <div>
                                        <textarea id="comment_c" cols="20" rows="4" class="form-control"
                                                  placeholder="扯淡、吐槽、表扬、鼓励……想说啥就说啥！"></textarea>
                                        <div class="pull-right m-t-md m-r-md tooltip-demo">
                                            <button id="comment_s" class="btn btn-primary btn-outline btn-sm"
                                                    type="button" data-toggle="tooltip" data-placement="left"
                                                    @if(\App\Http\Controllers\Tool::isLogin())
                                                    title="你已登录，可以评论..."
                                                    @else
                                                    title="请登陆后再发表评论哦..."
                                                    @endif
                                            >发表评论
                                            </button>
                                        </div>
                                    </div>
                                    <div class="chat-discussion animated fadeInLeft" style="margin: 60px 0 0 0;padding: 0;">
                                        <?php $i = count($comments);$lc = ['沙发', '板凳', '地板', '地下室', '下水道']; ?>
                                        @foreach($comments as $key=>$comment)
                                            <?php $i--; ?>
                                            <div class="chat-message left m-t-md">
                                                <img class="message-avatar img-circle head_pic"
                                                     src="{{ asset($comment->head_pic) }}"
                                                     alt="大头照啦 ~\(≧▽≦)/~">
                                                <div class="message">
                                                    <a class="message-author"
                                                       href="/u/{{ $comment->add_user_id }}"> {{ $comment->name }} </a>
                                                    <span class="message-date">
                                            @if(\App\Http\Controllers\Tool::getLevel()==1)
                                                            <a type="button" class="btn btn-outline btn-danger btn-xs"
                                                               onclick="delComment({!! $comment->id.',\''. csrf_token().'\'' !!})">删除评论</a>
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
                                        </small>

                                    </span>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="text-center">
                                            <ul class="pagination">
                                                <?php $pages = ($c_count % 10 == 0) ? ($c_count / 10) : ($c_count / 10 + 1); ?>
                                                @for($i=1;$i<=$pages;$i++)
                                                    <?php $page = $class = ($i == (isset($_GET['page']) ? $_GET['page'] : 1)) ? "class='active'" : ""; ?>
                                                    <li {!! $class !!}>
                                                        <a href="/show?course={{ $course->url }}&ware={{ $detail['url'] }}&cpage={{ $i }}">
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
                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
                                <div class="col-lg-12">
                                    <button class="btn btn-primary btn-outline btn-sm" id="p_add">提问</button>
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
                                                            {{ $problem->title }}
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
                                                <?php $pages = ($p_count%10==0)?($p_count/10):($p_count/10+1); ?>
                                                @for($i=1;$i<=$pages;$i++)
                                                    <?php $page= $class=($i==(isset($_GET['page'])?$_GET['page']:1))?"class='active'":""; ?>
                                                    <li {!! $class !!}>
                                                        <a href="/problem?course={{ $course['url'] }}&ware={{ $detail['url'] }}&ppage={{ $i }}">
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
                        <div id="tab-3" class="tab-pane">
                            <div class="panel-body">
                                <button class="btn btn-primary btn-outline btn-sm" id="n_add">记笔记</button>
                                <div class="ibox">
                                <div class="chat-discussion" style="margin: 0;padding: 0;">
                                @foreach($notes as $key=>$note)
                                    <div class="chat-message left m-t-md">
                                        <img class="message-avatar img-circle head_pic" src="{{ asset($note->head_pic) }}"
                                             alt="大头照啦 ~\(≧▽≦)/~">
                                        <div class="message">
                                            <a class="message-author"
                                               href="/u/{{ $note->add_user_id }}"> {{ $note->name }} </a>
                                            <span class="message-date">
                                            @if(\App\Http\Controllers\Tool::getLevel()==1)
                                                    <a type="button" class="btn btn-outline btn-danger btn-xs"
                                                       onclick="delNote({!! $note->id.',\''. csrf_token().'\'' !!})">删除笔记</a>
                                                @endif
                                                &nbsp;&nbsp;
                                                @if($note->like_status==1)
                                                    <a onclick="dislike_note({{ $note->id }})">
                                            <i class="fa fa-thumbs-up fa-lg" style="color: #ff6d00;"></i>
                                        </a>
                                                @else
                                                    <a onclick="like_note({{ $note->id }})">
                                            <i class="fa fa-thumbs-o-up fa-lg"></i>
                                        </a>
                                                @endif
                                                &nbsp;{{ $note->like }}&nbsp;&nbsp;


                                    </span>
                                            <span class="message-content" style="margin: 10px;">
											{!! $note->note !!}
                                    </span>
                                            <span class="message-foot" style="margin: 5px;">
                                        <small>
                                            时间：{{ \App\Http\Controllers\Tool::datetime_to_YmdHi($note->created_at) }}
                                        </small>

                                    </span>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                                    <div class="text-center">
                                        <ul class="pagination">
                                            <?php $pages = ($n_count%10==0)?($n_count/10):($n_count/10+1); ?>
                                            @for($i=1;$i<=$pages;$i++)
                                                <?php $page = $class = ($i == (isset($_GET['page']) ? $_GET['page'] : 1)) ? "class='active'" : ""; ?>
                                                <li {!! $class !!}>
                                                    <a href="/note?course={{ $course['url'] }}&ware={{ $detail['url'] }}&npage={{ $i }}">
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

        </div>

        <!--提问的模态框-->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="p_add_modal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="exampleModalLabel">发布问题</h4>
                    </div>
                    <div class="modal-body">
                        <form id="p_form">
                            {{ csrf_field() }}
                            <input type="text" name="course_id" value="{{ $course->id }}" hidden="hidden">
                            <input type="text" name="ware_id" value="{{ $detail['id'] }}" hidden="hidden">
                            <div class="form-group">
                                <label for="p_title">标题</label>
                                <input type="text" class="form-control" id="p_title" name="p_title" placeholder="Title">
                            </div>

                            <div class="form-group">
                                <label for="p_problem">问题详情</label>
                                <textarea name="p_problem" id="p_problem"></textarea>
                            </div>
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                            <button type="button" class="btn btn-primary" onclick="p_add()">添加</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--记笔记的模态框-->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="n_add_modal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="exampleModalLabel">添加笔记</h4>
                    </div>
                    <div class="modal-body">
                        <form id="n_form">
                            {{ csrf_field() }}
                            <input type="text" name="course_id" value="{{ $course->id }}" hidden="hidden">
                            <input type="text" name="ware_id" value="{{ $detail['id'] }}" hidden="hidden">
                            <div class="form-group">
                                <label for="n_note">笔记详情</label>
                                <textarea name="n_note" id="n_note"></textarea>
                            </div>
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                            <button type="button" class="btn btn-primary" onclick="n_add()">添加</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="{{ asset('public/js/ueditor/ueditor.config.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/ueditor/ueditor.all.js') }}"></script>
        <script>
            function re_captcha() {
                $url = "{{ URL('/img/comment_code') }}";
                $url = $url + "/" + Math.random();
                document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src = $url;
            }
            function like(comment_id) {
                dolike('/like', 1, comment_id, '{!! csrf_token() !!}')
            }

            function dislike(comment_id) {
                dolike('/dislike', 1, comment_id, '{!! csrf_token() !!}');
            }

            function like_problem(problem_id) {
                dolike_problem('/problem-like',2,problem_id,'{!! csrf_token() !!}');
            }

            function dislike_problem(problem_id) {
                dolike_problem('/problem-dislike',2,problem_id,'{!! csrf_token() !!}');
            }

            function like_note(note_id) {
                dolike_note('/note-like',3,note_id,'{!! csrf_token() !!}');
            }

            function dislike_note(note_id) {
                dolike_note('/note-dislike',3,note_id,'{!! csrf_token() !!}');
            }
            
            function p_add() {
                var p_form = new FormData(document.getElementById("p_form"));
                $.ajax({
                    type: "post",
                    data: p_form,
                    processData:false,
                    contentType:false,
                    url: "/problem-add-do",
                    success: function(data) {
                        if(data.status==1) {
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
                })
            }

            function n_add() {
                var n_form = new FormData(document.getElementById("n_form"));
                $.ajax({
                    type: "post",
                    data: n_form,
                    processData:false,
                    contentType:false,
                    url: "/note-add-do",
                    success: function(data) {
                        if(data.status==1) {
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
                })
            }

            $(function () {
//                $("#spider_content").find("a").hide();
                $('#comment_c').val('');

                $('#comment_s').click(function () {
                    var comment = $('#comment_c').val();

                    $.ajax({
                        type: "post",
                        data: {
                            'comment': comment,
                            'course_id': {{ $detail['course_id'] }},
                            'ware_id':{{ $detail['id'] }} ,
                            'type': 1,
                            '_token': '{!! csrf_token() !!}'
                        },
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
                var ue = UE.getEditor('p_problem',{initialFrameWidth:null,initialFrameHeight:300});
//                ue.setContent('');
                $('#p_add').click(function () {
                    $('#p_add_modal').modal('show');
                })

                var ue2 = UE.getEditor('n_note',{initialFrameWidth:null,initialFrameHeight:300});
//                ue2.setContent('');
                $('#n_add').click(function () {
                    $('#n_add_modal').modal('show');
                })
            })
        </script>
@endsection
