@extends('layout.main')

@section('title','iTool - 在线编辑神器')

@section('body')
    <script type="text/javascript">
        $(function(){
            $('.footer').hide();
            $('iframe').css("height",function(){
                return $(window).height()-55;
            })
        })
    </script>
    <iframe src="http://tool.usta.wiki" width="100%" frameborder="0">
    </iframe>
@endsection