@extends('layout/main')

@section('title','500 Error')

@section('body')

<div class="middle-box text-center animated fadeInDown">
        <h1>500</h1>
        <h3 class="font-bold">Internal Server Error</h3>

        <div class="error-desc">
            The server encountered something unexpected that didn't allow it to complete the request. We apologize.<br/>
            You can go back to main page: <br/><a href="javascript:window.history.go(-1);" class="btn btn-primary m-t"> Go back </a>
        </div>
    </div>

<script type="text/javascript">
	$(function(){
		$('body').addClass('gray-bg');
	})
</script>

@endsection
