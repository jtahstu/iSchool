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
function getDay() {
    var now = new Date();
    var nowYear = now.getFullYear();
    var days = getToday() - 85 + (nowYear - 2017) * 365;
    return days;
}


function delComment(comment_id, token) {
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
        function (isConfirm) {
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
            } else {
                swal("Cancelled", "Your course ware is safe :)", "error");
            }
        })
}

function delNote(note_id, token) {
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
        function (isConfirm) {
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
            } else {
                swal("Cancelled", "Your course ware is safe :)", "error");
            }
        })
}

//首页弹出公告所用
function announce(token) {
    $.ajax({
        type: "post",
        data: {'_token': token},
        url: "/announce-get-one",
        success: function (data) {
            $('#announce_modal_title').html(data.msg.title);
            $('#announce_modal_body').html(data.msg.content);
            $('#announce_modal_time').html(data.msg.created_at);
            $('#show_announce_modal').modal('show');
        }
    })
}

function dolike(url,type,comment_id,token) {
    $.ajax({
        url: url,
        data: {'type':type ,'comment_id':comment_id , '_token': token},
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

function dolike_problem(url,type,problem_id,token) {
    $.ajax({
        url: url,
        data: {'type':type ,'problem_id':problem_id , '_token': token},
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

function dolike_note(url,type,note_id,token) {
    $.ajax({
        url: url,
        data: {'type':type ,'note_id':note_id , '_token': token},
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