@extends('layout/main')

@section('title','404 Error')

@section('body')

<div class="middle-box text-center animated fadeInDown">
	<h1>404</h1>
	<h3 class="font-bold">Page Not Found</h3>

	<div class="error-desc">
		Sorry, but the page you are looking for has note been found. Try checking the URL for error, then hit the refresh button on your browser or try found something else in our app.
		<br />
		<a href="javascript:window.history.go(-1);" class="btn btn-primary m-t"> Go back </a>
	</div>
</div>

<script type="text/javascript">
	$(function(){
		$('body').addClass('gray-bg');
	})
</script>

@endsection
