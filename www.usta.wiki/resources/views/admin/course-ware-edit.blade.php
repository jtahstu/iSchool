@extends('layout.admin-main')

@section('title','课件编辑')

@section('head')
    <script type="text/javascript" src="{{ asset('public/js/ueditor/ueditor.config.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js//ueditor/ueditor.all.js') }}"></script>
    <script>
        $(function(){
            var ue = UE.getEditor('description',{initialFrameWidth:null,initialFrameHeight:600});

        })

        function save() {
            var form = new FormData(document.getElementById("form"));
            $.ajax({
                type: "post",
                data: form,
                processData:false,
                contentType:false,
                url: "/course-ware-edit-do",
                success: function(data) {
                    if(data.status==1) {
                        swal({
                            title: data.msg,
                            type: "success",
                            confirmButtonColor: "#30B593"
                        });
                        setTimeout('location.reload()');
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
    </script>
@endsection

@section('body')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="panel-body">
                        <fieldset class="form-horizontal">
                            <form action="" id="form">
                                {{ csrf_field() }}
                                <input type="text" value="{{ $detail['id'] }}" name="id" hidden="hidden">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">课件标题 </label>
                                    <div class="col-sm-11">
                                        <input name="title" type="text" class="form-control" placeholder="Course ware title" value="{{ $detail['title'] }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">课件链接 </label>
                                    <div class="col-sm-11">
                                        <input name="url" type="text" class="form-control" placeholder="Course ware url" value="{{ $detail['url'] }}">
                                    </div>
                                </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label">课件浏览量 </label>
                                <div class="col-sm-11">
                                    <input name="view" type="text" class="form-control" placeholder="Course ware name" value="{{ $detail['view'] }}">
                                </div>
                            </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">课件详情 </label>
                                    <div class="col-sm-11">
                                        <textarea name="content" id="description">{!!  $detail['content'] !!}</textarea>
                                    </div>
                                </div>
                            </form>
                        </fieldset>
                    </div>

                        <div class="form-group">
                            <label class="col-sm-1 control-label"></label>
                            <div class="col-sm-10">
                                <button class="btn btn-primary" onclick="save()" id="save">
                                    <i class="fa fa-save"></i> 编辑
                                </button>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>

@endsection