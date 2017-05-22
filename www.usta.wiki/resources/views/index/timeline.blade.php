@extends('layout.main')

@section('title','iSchool时光机')

@section('body')
    <script>
        $(document).ready(function(){

            $('#leftVersion').click(function(event) {
                event.preventDefault();
                $('#vertical-timeline').toggleClass('center-orientation');
            });


        });
    </script>
    <div class="wrapper wrapper-content">
        <div class="row animated fadeInRight">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="pull-right float-e-margins p-md">
                        @if(\App\Http\Controllers\Tool::getLevel()==1)
                            <a href="/git" class="btn btn-sm btn-primary" id="add_git">添加Git记录</a>
                        @endif
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#" class="btn btn-sm btn-primary" id="leftVersion">Change</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="https://github.com/jtahstu/iSchool" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-github"></i> GitHub</a>
                    </div>
                    <div class="ibox-content" id="ibox-content">
                        <div class="text-center vertical-date">
                            <h2>iSchool 时光机</h2> &nbsp;&nbsp;
                            <small>Git累计提交{{ count($gits) }}次</small>
                        </div>
                        <div id="vertical-timeline" class="vertical-container dark-timeline center-orientation">
                            <?php $bg=['navy-bg','blue-bg','lazur-bg','yellow-bg'] ?>
                            @foreach($gits as $key=>$git)
                                <div class="vertical-timeline-block">
                                    <div class="vertical-timeline-icon {{ $bg[$git['id']%4] }}">
                                        <i class="fa fa-git"></i>
                                    </div>

                                    <div class="vertical-timeline-content">
                                        <h2>V {{ $git['version'] }}</h2>
                                        <p>{{ $git['content'] }}
                                        </p>
                                        <span class="vertical-date">
                                        {{ \App\Http\Controllers\Tool::datetime_to_YmdHi($git['created_at']) }} <br/>
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