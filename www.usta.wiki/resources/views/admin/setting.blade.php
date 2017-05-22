@extends('layout.admin-main')

@section('title','个人设置')


@section('body')
    <script>
        function save() {
            var form = new FormData(document.getElementById("form"));
            $.ajax({
                type: "post",
                data: form,
                processData: false,
                contentType: false,
                url: "/user-edit-do",
                success: function (data) {
                    if (data.status == 1) {
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
    <div class="wrapper wrapper-content  animated fadeInRight article">
        <div class="row m-t-md m-b-lg">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>用户信息设置</h5>
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
                        <form class="form-horizontal" id="form">
                            {!! csrf_field() !!}
                            <input type="text" name="id" id="id" hidden="hidden" value="{{ $user->id }}">
                            <div class="form-group"><label class="col-sm-2 control-label">用户名</label>

                                <div class="col-sm-10"><input type="text" class="form-control" placeholder="Username"
                                                              name="name" value="{{ $user->name }}"></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">邮箱</label>
                                <div class="col-sm-10"><input type="text" class="form-control" placeholder="Email"
                                                              disabled="disabled" value="{{ $user->email }}">
                                </div>
                            </div>
                            {{--<div class="hr-line-dashed"></div>--}}
                            {{--<div class="form-group"><label class="col-sm-2 control-label">密码</label>--}}

                            {{--<div class="col-sm-10"><input type="password" class="form-control"--}}
                            {{--placeholder="Password" name="password"  value="{{ $user->password }}"></div>--}}
                            {{--</div>--}}
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">性别</label>
                                <div class="col-sm-10">
                                    <div class="i-checks">
                                        <label> <input type="radio" name="gender"
                                                       <?php echo $user->gender == 1 ? 'checked="checked"' : ""; ?> value="1">
                                            男 </label>
                                    </div>
                                    <div class="i-checks">
                                        <label> <input type="radio" name="gender"
                                                       <?php echo $user->gender == 0 ? 'checked="checked"' : ""; ?> value="0">
                                            女</label>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">学校</label>
                                <div class="col-sm-10"><input type="text" placeholder="School" name="school"
                                                              class="form-control" value="{{ $user->school }}"></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-lg-2 control-label">地址</label>
                                <div class="col-lg-10"><input type="text" name="address"
                                                              placeholder="Address" class="form-control"
                                                              value="{{ $user->address }}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-lg-2 control-label">公司</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="company" placeholder="Company"
                                           value="{{ $user->company }}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-lg-2 control-label">头像预览</label>
                                <div class="col-lg-10">
                                    <img class="img-circle" src="{{ \App\Http\Controllers\Tool::get_user_head_pic() }}"
                                         alt="" style="width:100px">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">头像</label>
                                <div class="col-sm-10">
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput"><i
                                                    class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                                    class="fileinput-filename"></span></div>
                                        <span class="input-group-addon btn btn-default btn-file">
			                                <span class="fileinput-new">选择文件</span><span
                                                    class="fileinput-exists">更换</span>
			                                <input type="file" name="file">
			                            </span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                           data-dismiss="fileinput">移除</a>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-lg-2 control-label">个性签名</label>
                                <div class="col-lg-10">
                                    <textarea name="signature" id="signature" class="form-control" cols="30"
                                              rows="10">{{ $user->signature }}</textarea>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                        </form>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit" id="save" onclick="save()">保存</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection