@extends('Compile/Clayout')

@section('value',$value)
@section('lang',$lang)
@section('mode',$mode)

@section('content')
{!! htmlspecialchars(($template)) !!}
@endsection
