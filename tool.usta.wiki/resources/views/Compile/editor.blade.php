@extends('Compile/Clayout')

@section('value',$value)
@section('language',$language)

@section('content')
{!! htmlspecialchars(($template)) !!}
@endsection
