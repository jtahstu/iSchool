@extends('layout.admin-main')

@section('title','用户管理')

@section('body')

    <div class="wrapper wrapper-content animated fadeInDown">

        <div class="row">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th class="text-center">id</th>
                            <th class="text-center">name</th>
                            <th class="text-center">email</th>
                            <th class="text-center">updated_at</th>
                            <th class="text-center">head_pic</th>
                            <th class="text-center">gender</th>
                            <th class="text-center">company</th>
                            <th class="text-center">address</th>
                            <th class="text-center">school</th>
                            <th class="text-center">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $key => $user) { ?>
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td><img src="/{{ $user->head_pic }}" alt="" class="head_pic img-circle" style="max-width: 30px;"></td>
                            <td>{{ $user->gender }}</td>
                            <td>{{ $user->company }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->school }}</td>

                            <td>
                                <button class="btn btn-primary btn-xs btn-outline" onclick="edit_row('{{ $user->id }}')">修改</button>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <!--修改的模态框-->
    <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="edit_modal">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel">编辑</h4>
                </div>
                <div class="modal-body">
                    <form id="form2">
                        {!! csrf_field() !!}
                        <input type="text" name="id" id="id" hidden="hidden">
                        <div class="form-group">
                            <label for="">name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="name">
                        </div>
                        <div class="form-group">
                            <label for="">email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="email">
                        </div>
                        <div class="form-group">
                            <label for="">updated_at</label>
                            <input type="text" class="form-control" id="updated_at" name="updated_at" placeholder="updated_at">
                        </div>
                        <div class="form-group">
                            <label for="">gender</label>
                            <input type="text" class="form-control" id="gender" name="gender" placeholder="gender">
                        </div>
                        <div class="form-group">
                            <label for="">company</label>
                            <input type="text" class="form-control" id="company" name="company" placeholder="company">
                        </div>
                        <div class="form-group">
                            <label for="">address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="address">
                        </div>
                        <div class="form-group">
                            <label for="">school</label>
                            <input type="text" class="form-control" id="school" name="school" placeholder="school">
                        </div>
                        <div class="form-group">
                            <label for="">个性签名</label>
                            <textarea name="signature" id="signature" class="form-control" cols="30"
                                      rows="6"></textarea>
                        </div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="button" class="btn btn-primary" onclick="edit()">编辑</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>

        function edit_row(id) {
            $.ajax({
                type: "post",
                data: {id:id,'_token': '{!! csrf_token() !!}'},
                url: "/user-get-one",
                success: function(data) {
                    $('#id').val(data.msg.id);
                    $('#name').val(data.msg.name);
                    $('#email').val(data.msg.email);
                    $('#updated_at').val(data.msg.updated_at);
                    $('#gender').val(data.msg.gender);
                    $('#company').val(data.msg.company);
                    $('#address').val(data.msg.address);
                    $('#school').val(data.msg.school);
                    $('#signature').val(data.msg.signature);
                    $('#edit_modal').modal('show');
                }
            })
        }

        function edit() {
            var form = new FormData(document.getElementById("form2"));
            $.ajax({
                type: "post",
                data: form,
                processData: false,
                contentType: false,
                url: "/user-edit-do",
                success: function(data) {
                    if(data.status==1){
                        $('#edit_modal').modal('hide');
                        swal({
                            title: data.msg,
                            type: "success",
                            confirmButtonColor: "#30B593"
                        });
                        location.reload();
                    }else{
                        swal({
                            title: data.message,
                            type: "error",
                            confirmButtonColor: "#F3AE56"
                        });
                    }

                }
            })
        }
    </script>
@endsection