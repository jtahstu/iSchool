@extends('layout/course')

@section('title',$course_main['course']['name'])

@section('head')
    <style>
        th, td {
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
                                                   onclick="delNote({!! $note->id.',\''. csrf_token().'\'' !!})">删除评论</a>
                                            @endif
                                            &nbsp;&nbsp;
                                            @if($note->like_status==1)
                                                <a onclick="dislike({{ $note->id }})">
                                            <i class="fa fa-thumbs-up fa-lg" style="color: #ff6d00;"></i>
                                        </a>
                                            @else
                                                <a onclick="like({{ $note->id }})">
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
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            源自：
                                                <a href="/show?course={{ $course_main['course']['name'] }}&ware={{ $note->url }}"
                                                   target="_blank">
                                                {{ $note->title }}
                                            </a>
                                        </small>

                                    </span>
                                    </div>
                                </div>
                            @endforeach
                            <div class="text-center">
                                <ul class="pagination">
                                    <?php $pages = ($count%10==0)?($count/10):($count/10+1); ?>
                                    @for($i=1;$i<=$pages;$i++)
                                        <?php $page = $class = ($i == (isset($_GET['page']) ? $_GET['page'] : 1)) ? "class='active'" : ""; ?>
                                        <li {!! $class !!}>
                                            <a href="/note?course={{ $course_main['course']['url'] }}&page={{ $i }}">
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
            $('pre').addClass('prettyprint lang-js').attr('style', 'overflow:auto;font-family:consola;');
            window.prettyPrint && prettyPrint();
        })
        function like(note_id) {
            dolike('/note-like',3,note_id)
        }

        function dislike(note_id) {
            dolike('/note-dislike',3,note_id);
        }

        function dolike(url,type,note_id) {
            $.ajax({
                url: url,
                data: {'type':type ,'note_id':note_id , '_token': '{!! csrf_token() !!}'},
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
