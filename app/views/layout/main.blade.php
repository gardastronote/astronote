@extends('layout.dashboard')
@section('style')
	@parent
	<link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/datepicker/datepicker3.css')}}">
@stop
@section('content')
	<div class="content-wrapper">
		<div class="container-fluid" id="content">
		</div>
	</div> 
@stop