/**
 * Created by jtusta on 2017/4/9.
 */
function getToday() {
    var now = new Date();
    var firstDay = new Date(now.getFullYear(), 0, 1);
    var dateDiff = now - firstDay;
    var msPerDay = 1000 * 60 * 60 * 24;
    var diffDays = Math.ceil(dateDiff / msPerDay);
    return diffDays;
}
function getDay(){
    var now=new Date();
    var nowYear=now.getFullYear();
    var days=getToday()-85+(nowYear-2017)*365;
    return days;
}


function delComment(comment_id,token) {
    swal({
            title: "Are you sure ?",
//                    text: "确定要删除 '"+name+"' 吗?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes , delete it !",
            cancelButtonText: "No , cancel plx !",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: "post",
                    data: {'id': comment_id, '_token': token},
                    url: "/course-comment-del-do",
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
            }else {
                swal("Cancelled", "Your course ware is safe :)", "error");
            }
        })
}

function delNote(note_id,token) {
    swal({
            title: "Are you sure ?",
//                    text: "确定要删除 '"+name+"' 吗?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes , delete it !",
            cancelButtonText: "No , cancel plx !",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: "post",
                    data: {'id': note_id, '_token': token},
                    url: "/course-note-del-do",
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
            }else {
                swal("Cancelled", "Your course ware is safe :)", "error");
            }
        })
}