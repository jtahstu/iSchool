@extends('layout/main')

@section('title',$detail['title'])

@section('head')
    <link href="/public/css/editormd.min.css" rel="stylesheet">
    <script src="/public/js/editormd/editormd.min.js"></script>
    {{--<script src="/public/js/prettify.js"></script>--}}
    {{--<link href="https://cdn.bootcss.com/prettify/r298/prettify.css" rel="stylesheet">--}}

    <script>
        var Editor;

        $(function () {
//            $('pre').addClass('prettyprint lang-js').attr('style', 'overflow:auto;font-family:consola;');
//            window.prettyPrint && prettyPrint();

            Editor = editormd("editormd", {
                width   : "100%",
                height  : 350,
                toolbarIcons : function() {
                    return ["undo", "redo", "|", "bold","del","italic","quote","|","h1","h2","h3","h4","h5","h6","|" ,"list-ul","list-ol","hr","|","clear", "preview"]
                },
                syncScrolling : "single",
                path    : '/public/js/editormd/lib/',
                saveHTMLToTextarea : true,
                taskList : true,
                tocm            : true,         // Using [TOCM]
                tex : true,                   // 开启科学公式TeX语言支持，默认关闭
                flowChart : true,             // 开启流程图支持，默认关闭
                sequenceDiagram : true,       // 开启时序/序列图支持，默认关闭,
            });

            $('#comment').click(function () {
                var comment = Editor.getHTML();
                var comment_code = $('#comment_code').val();

                $.ajax({
                    type: "post",
                    data: {'comment': comment,'comment_code':comment_code , '_token': '{!! csrf_token() !!}'},
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
                    {{--<div class="ibox-title">--}}
                        {{--<h5>--}}
                            {{--{{ $detail['title'] }}--}}
                        {{--</h5>--}}
                        {{--<div class="ibox-tools">--}}
                            {{--<i class="fa fa-eye"></i> {{ $detail['view'] }}--}}
                            {{--&nbsp;&nbsp;--}}
                            {{--<i class="fa fa-clock-o"></i> {{ \App\Http\Controllers\Tool::datetime_to_YmdHi($detail['updated_at']) }}--}}
                            {{--&nbsp;&nbsp;--}}
                            {{--@if(\App\Http\Controllers\Tool::getLevel()==1)--}}
                            {{--<a href="/course-ware-edit/{{ $detail['id'] }}" target="_blank">--}}
                                {{--<button class="btn btn-primary btn-outline btn-xs">编辑课件</button>--}}
                            {{--</a>--}}
                            {{--&nbsp;&nbsp;--}}
                            {{--@endif--}}
                            {{--<a class="collapse-link">--}}
                                {{--<i class="fa fa-chevron-up"></i>--}}
                            {{--</a>--}}


                            {{--<a class="close-link">--}}
                                {{--<i class="fa fa-times"></i>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="ibox-content">
                        <div class="article-intro" id="content">
                            {!! $detail['content'] !!}
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
                            <li>支持 Markdown 格式, <strong>**粗体**</strong>、<code>```代码```</code>, 更多语法请见这里 <a
                                        href="http://www.markdown.cn/"
                                        target="_blank">Markdown 语法</a></li>
                            <li>目前MarkDown在添加代码时，预览会有点问题，但不影响评论后的效果 ╮(╯▽╰)╭哎</li>
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
                                        </small>

                                    </span>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="text-center">
                                            <ul class="pagination">
                                                @for($i=1;$i<=$c_count/10+1;$i++)
                                                    <?php $page= $class=($i==(isset($_GET['page'])?$_GET['page']:1))?"class='active'":""; ?>
                                                    <li {!! $class !!}>
                                                        <a href="/show?course={{ $course->url }}&ware={{ $detail['url'] }}&page={{ $i }}">
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
                                <pre>
                                    {{ var_dump($comments) }}
                                </pre>

                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane">
                            <div class="panel-body">
                                <strong>Donec quam felis</strong>

                                <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects
                                    and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
        <script>
            function re_captcha() {
                $url = "{{ URL('/img/comment_code') }}";
                $url = $url + "/" + Math.random();
                document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
            }
            function like(comment_id) {
                dolike('/like',1,comment_id,'{!! csrf_token() !!}')
            }

            function dislike(comment_id) {
                dolike('/dislike',1,comment_id,'{!! csrf_token() !!}');
            }
            $(function () {
                $("#content").find("a").hide();
                $('#comment_c').val('');

                $('#comment_s').click(function () {
                    var comment = $('#comment_c').val();

                    $.ajax({
                        type: "post",
                        data: {'comment': comment,'course_id': {{ $detail['course_id'] }},'ware_id':{{ $detail['id'] }} , 'type':1 , '_token': '{!! csrf_token() !!}'},
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
        </script>
@endsection
