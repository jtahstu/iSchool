@extends('layout.admin-main')

@section('title','Git管理')

@section('head')

@endsection

@section('body')
   <div class="wrapper wrapper-content  animated fadeInRight article">
      <div class="row">
         <div class="col-lg-12">
            <div class="ibox float-e-margins">
               <div class="ibox-title">
                  <h5>Git管理</h5>
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
                  <button class="btn btn-primary btn-outline btn-sm" id="add">添加</button>
                  <br>
                  <table class="table table-bordered col-lg-12">
                     <thead>
                     <tr>
                        <th>ID</th>
                        <th>内容</th>
                        <th>版本</th>
                        <th>添加时间</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($gits as $key=>$git)
                        <tr>
                           <td>{{ $git->id }}</td>
                           <td>{{ $git->content }}</td>
                           <td>{{ $git->version }}</td>
                           <td>{{ $git->created_at }}</td>
                        </tr>
                     @endforeach
                     </tbody>
                  </table>

               </div>
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
                     <label for="content">内容</label>
                     <input type="text" class="form-control" id="content" name="content" placeholder="content">
                  </div>
                  <div class="form-group">
                     <label for="version">版本</label>
                     <input type="text" class="form-control" id="version" name="version" placeholder="version">
                  </div>
                  <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                  <button type="button" class="btn btn-primary" onclick="add()">添加</button>
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
           var content=$('#content').val();
           var version=$('#version').val();
           $.ajax({
               type: "post",
               data: {content:content,version:version,'_token': '{!! csrf_token() !!}'},
               url: "/git-add-do",
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
   </script>
@endsection