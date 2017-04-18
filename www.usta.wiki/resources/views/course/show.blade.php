@extends('layout/main')

@section('title',$detail['title'])

@section('head')
    {{--<link href="{{asset('public/css/bootstrap-markdown.min.css')}}" rel="stylesheet">--}}
    {{--<script src="{{asset('public/js/bootstrap-markdown.js')}}"></script>--}}
    {{--<script src="{{asset('public/js/markdown.js')}}"></script>--}}

    <link href="{{asset('public/css/sweetalert.css')}}" rel="stylesheet">
    <script src="{{asset('public/js/sweetalert.min.js')}}"></script>

    <link href="{{asset('public/css/editormd.min.css')}}" rel="stylesheet">
    <script src="{{asset('public/js/editormd.min.js')}}"></script>
    <script src="{{ asset('public/js/prettify.js') }}"></script>

    <script>
        var Editor;

        $(function () {
            $('pre').addClass('prettyprint lang-js').attr('style', 'overflow:auto');
            window.prettyPrint && prettyPrint();

            Editor = editormd("editormd", {
                width   : "100%",
                height  : 350,
                toolbarIcons : function() {
                    return ["undo", "redo", "|", "bold","del","italic","quote","|","h1","h2","h3","h4","h5","h6","|" ,"list-ul","list-ol","hr","|","clear", "preview"]
                },
                syncScrolling : "single",
                path    : '/public/js/lib/',
                saveHTMLToTextarea : true,
                taskList : true,
                tocm            : true,         // Using [TOCM]
                tex : true,                   // 开启科学公式TeX语言支持，默认关闭
                flowChart : true,             // 开启流程图支持，默认关闭
                sequenceDiagram : true,       // 开启时序/序列图支持，默认关闭,
            });
            $('#comment').click(function () {
                var comment = Editor.getHTML();
                alert(comment);
                $.ajax({
                    type: "post",
                    data: {'comment': comment, '_token': '{!! csrf_token() !!}'},
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
            })

        })
    </script>
    @endsection

    @section('nav_li')
    @foreach($courses as $key=>$c)
    @if($c->id>1 && $c->first==1)
    </ul>
    </li>
    @endif
    @if($c->first==1)
        <li>
            <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">{{ $c->type_des }}</span> <span
                        class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                @endif
                <li>
                    <a href="{{ URL::action('CourseController@show',['course'=>$c->url]) }}">
                        <i class="fa fa-list-ul"></i> {{ $c->name }} 教程
                    </a>
                </li>
                @endforeach
            </ul>
        </li>

        <li class="active">
            <a href="#"><i class="fa fa-list-ul"></i> <span class="nav-label">{{ $course['name'] }} 教程</span><span
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
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>{{ $detail['title'] }}</h5>
                        <div class="ibox-tools">
                            <i class="fa fa-eye"></i> {{ $detail['view'] }}
                            &nbsp;&nbsp;
                            <i class="fa fa-clock-o"></i> {{ date_format(date_create($detail['updated_at']), 'Y-m-d H:i') }}
                            &nbsp;&nbsp;
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>


                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
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
                            <li style="color: #ff6d00;">请先登录后，再发表评论</li>
                            <li>请注意单词拼写，以及中英文排版，<a href="https://github.com/sparanoid/chinese-copywriting-guidelines"
                                                   target="_blank">参考此页</a></li>
                            <li>支持 Markdown 格式, <strong>**粗体**</strong>、<code>```代码```</code>, 更多语法请见这里 <a
                                        href="http://www.markdown.cn/"
                                        target="_blank">Markdown 语法</a></li>
                            <li>目前MarkDown在添加代码时，预览会有点问题，但不影响评论后的效果</li>
                        </ul>
                    </div>
                </div>
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>评论列表 &nbsp;(<i class="fa fa-comment"></i>{{ count($comments) }})</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content" style="padding: 12px;">
                        <div class="col-lg-12">
                            {{--编辑器--}}
                            <div id="editormd">
                            </div>

                            <div>
                                <div class="m-t-sm m-b-sm pull-right dim btn-lg">
                                    <button class="btn btn-primary" id="comment"><i class="fa fa-comment"></i> 评论
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="chat-discussion">
                            <?php $i = count($comments);$lc = ['沙发', '板凳', '地板', '地下室', '下水道']; ?>
                            @foreach($comments as $key=>$comment)
                                <?php $i--; ?>
                                <div class="chat-message left">
                                    <img class="message-avatar img-circle" src="{{ asset('public/img/tx/0.png') }}"
                                         alt="">
                                    <div class="message">
                                        <a class="message-author" href="#"> {{ $comment->name }} </a>
                                        <span class="message-date">
                                        @if($i<count($lc))
                                                <button class="btn btn-primary btn-outline btn-xs"> {{ $lc[$i] }} </button>
                                            @else
                                                <button class="btn btn-primary btn-outline btn-xs"> {{ $i+1 }}
                                                    楼 </button>
                                            @endif
                                            &nbsp;{{ date_format(date_create($comment->created_at), 'Y-m-d H:i') }}
                                    </span>
                                        <span class="message-content">
											{!! $comment->comment !!}
                                            </span>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
