<!DOCTYPE html>
<html>

	<head>
		@include('Compile.head')
	</head>

	<body>
		@if(isset($_GET['m']))
			@include('Mobile.header')
		@else
			@include('Compile.header')
		@endif
		@include('Compile.changyan')
		@if(isset($_GET['m']))
			@include('Mobile.footer')
		@else
			@include('Compile.footer')
		@endif
	</body>
</html>
