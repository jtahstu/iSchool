@extends('layout.admin-main')

@section('title','网站配置')

@section('body')

    <div class="wrapper wrapper-content animated fadeInDown">

        <div class="row">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <button class="btn btn-primary btn-outline btn-sm" id="add">添加</button>

                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th class="text-center">id</th>
                            <th class="text-center">type</th>
                            <th class="text-center">name</th>
                            <th class="text-center">value</th>
                            <th class="text-center">des</th>
                            <th class="text-center">updated_at</th>
                            <th class="text-center">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($sets as $key => $set) { ?>
                        <tr>
                            <td>{{ $set['id'] }}</td>
                            <td>{{ $set['type'] }}</td>
                            <td>{{ $set['name'] }}</td>
                            <td>{{ $set['value'] }}</td>
                            <td>{{ $set['des'] }}</td>
                            <td>{{ $set['updated_at'] }}</td>
                            <td>
                                <button class="btn btn-primary btn-xs btn-outline" onclick="edit_row('<?php echo $set['name']; ?>')">修改</button>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <!--添加的模态框-->
    <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="add_modal">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel">添加</h4>
                </div>
                <div class="modal-body">
                    <form id="form2">
                        <div class="form-group">
                            <label for="exampleInputEmail1">type</label>
                            <input type="text" class="form-control" id="type2" name="type2" placeholder="type">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">* name</label>
                            <input type="text" class="form-control" id="name2" name="name2" placeholder="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">* value</label>
                            <input type="text" class="form-control" id="value2" name="value2" placeholder="value">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">des</label>
                            <input type="text" class="form-control" id="des2" name="des2" placeholder="des">
                        </div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="button" class="btn btn-primary" onclick="add()">添加</button>
                    </form>
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
                        <input type="text" name="id" id="id" hidden="hidden">
                        <div class="form-group">
                            <label for="exampleInputEmail1">type</label>
                            <input type="text" class="form-control" id="type" name="type" placeholder="type">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">* name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">* value</label>
                            <input type="text" class="form-control" id="value" name="value" placeholder="value">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">des</label>
                            <input type="text" class="form-control" id="des" name="des" placeholder="des">
                        </div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="button" class="btn btn-primary" onclick="edit()">编辑</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('#add').click(function () {
                $('#add_modal').modal('show');
            })
        })
        function add() {
            var type=$('#type2').val();
            var name=$('#name2').val();
            var value=$('#value2').val();
            var des=$('#des2').val();
            $.ajax({
                type: "post",
                data: {type:type,name:name,value:value,des:des,'_token': '{!! csrf_token() !!}'},
                url: "/config-add-do",
                success: function(data) {
                    if(data.status==1) {
                        $('#add_model').modal('hide');
                        swal({
                            title: data.msg,
                            type: "success",
                            confirmButtonColor: "#30B593"
                        });
                        setTimeout('location.reload()');
                    } else {
                        $('#add_model').modal('hide');
                        swal({
                            title: data.msg,
                            type: "error",
                            confirmButtonColor: "#F3AE56"
                        });
                    }
                }
            })
        }

        function edit_row(name) {
            $.ajax({
                type: "post",
                data: {name:name,'_token': '{!! csrf_token() !!}'},
                url: "/config-get-one",
                success: function(data) {
                    $('#id').val(data.msg.id);
                    $('#type').val(data.msg.type);
                    $('#name').val(data.msg.name);
                    $('#value').val(data.msg.value);
                    $('#des').val(data.msg.des);
                    $('#edit_modal').modal('show');
                }
            })
        }

        function edit() {
            var id = $('#id').val();
            var type=$('#type').val();
            var name=$('#name').val();
            var value=$('#value').val();
            var des=$('#des').val();
            $.ajax({
                type: "post",
                data: {id:id,type:type,name:name,value:value,des:des,'_token': '{!! csrf_token() !!}'},
                url: "/config-edit-do",
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