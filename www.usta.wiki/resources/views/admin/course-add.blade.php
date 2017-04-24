@extends('layout.admin-main')

@section('title','课程添加')

@section('head')

    <script>
        $(function () {
            clear();

            $('#reset_2').click(function () {
                clear();
            });
        })
        function save() {
            var form = new FormData(document.getElementById("uploadForm"));
            $.ajax({
                type: "post",
                data: form,
                processData:false,
                contentType:false,
                url: "/course-add-do",
                success: function(data) {
                    if(data) {
                        swal({
                            title: '修改成功！',
                            type: "success",
                            confirmButtonColor: "#30B593"
                        });
                        setTimeout('location.reload()');
                    } else {
                        swal({
                            title: '修改失败！',
                            type: "error",
                            confirmButtonColor: "#F3AE56"
                        });
                    }

                }
            });
        }

        function clear() {
            $('#reset').click();
        }

    </script>
@endsection

@section('body')
    <?php  ?>
    <div class="wrapper wrapper-content  animated fadeInRight article">
        <div class="row m-t-md m-b-lg">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>课程添加</h5>
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
                        <form class="form-horizontal" id="uploadForm" enctype="multipart/form-data" method="post">
                            {!! csrf_field() !!}
                            <input type="text" hidden="hidden" name="id">
                            <div class="form-group"><label class="col-sm-2 control-label">教程名</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Name" name="name"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">教程介绍</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="des" placeholder="Des" >
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">链接</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="url" placeholder="Url"  >
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">排序</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="sort" placeholder="Sort"  >
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">是否首个</label>
                                <div class="col-sm-10">
                                    <div class="i-checks"><label> <input type="radio" value="1" name="first"> <i></i> Yes</label></div>
                                    <div class="i-checks"><label> <input type="radio" value="0" name="first"> <i></i> No </label></div>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">类型介绍</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="type_des" placeholder="Type Des">
                                </div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">封面图</label>
                                <div class="col-sm-10">
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                        <span class="input-group-addon btn btn-default btn-file">
			                                <span class="fileinput-new">选择文件</span><span class="fileinput-exists">更换</span>
			                                <input type="file" name="file">
			                            </span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">移除</a>
                                    </div>
                                </div>
                            </div>
                            <input type="reset" hidden="hidden" id="reset" />
                        </form>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-warning" id="reset_2"><i class="fa fa-trash"></i> 清空</button>
                                <button class="btn btn-primary" onclick="save()" id="save"><i class="fa fa-save"></i> 保存</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection