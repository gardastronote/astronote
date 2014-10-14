<!DOCTYPE html>
<html>
<head>
	<title></title>
	@section('style')
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/datepicker/datepicker3.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('semantic/css/semantic.min.css')}}">
	@show
	<script type="text/javascript" src="{{asset('js/jquery-2.1.1.min.js')}}"></script>
</head>
<body onload="loadChart()">
<nav class="navbar navbar-inverse navbar-fixed-top">
	<a href="#" class="navbar-brand"><img src="{{asset('images/logo.png')}}"></a>
	<ul class="nav navbar-nav pull-right">
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#"><strong class="caret"></strong> {{Auth::user()->full_name}} <img class="avatar" src="{{asset('avatar/'.Auth::user()->avatar)}}"></a>
			<ul class="dropdown-menu pull-right">
				<li><a class="dropdown-update loadContent" href="{{url('/user/setting/'.Auth::user()->id)}}"><span class="glyphicon glyphicon-cog"></span> Pengaturan</a></li>
				<li><a class="dropdown-delete" href="{{action('AppController@logout')}}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
		</li>
	</ul>
</nav>
<aside class="navbar-inverse collapse navbar-collapse navbar-ex1-collapse">
	<ul class="nav navbar-nav side-nav">
		<li><a id="home" href="#"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
		<li>
			<a href="#" data-toggle="collapse" data-target="#vendor-menu"><b class="caret"></b> Daftar Vendor</a>
			<ul id="vendor-menu" class="dropdown-side collapse">
				<li><a href="/vendor/chart" class="loadContent">Chart</a></li>
				<li><a href="/vendor" class="loadContent">Vendor</a></li>
				<li><a href="/vendor/pelatihan" class="loadContent"><i class="puzzle piece icon"></i> Pelatihan</a></li>
				<li><a href="/vendor/catering" class="loadContent"><i class="food icon"></i> Catering</a></li>
				<li><a href="/vendor/hotel" class="loadContent"><i class="building icon"></i> Hotel</a></li>
			</ul>
		</li>
		@if(Auth::user()->access == MTR || Auth::user()->access == ADMIN)
		<li>
			<a href='#' data-toggle="collapse" data-target="#data_pegawai"><span class="caret"></span> Daftar Pelatihan</a>
			<ul id="data_pegawai" class="dropdown-side collapse">
				<li><a class="loadContent" id="pegawai" href="/data_pegawai"><span class="glyphicon glyphicon-user"></span> Data Pegawai</a></li>
				<li><a class="loadContent" id="pegawai" href="/pelatihan"><span class="glyphicon glyphicon-user"></span> Data Pelatihan</a></li>
				<li><a class="loadContent" href="/pengaturan_data_pegawai"><span class="glyphicon glyphicon-cog"></span> Atur Data Pegawai</a></li>
				<li><a class="loadContent" href="/pengaturan_data_pelatihan"><span class="glyphicon glyphicon-cog"></span> Atur Data Pelatihan</a></li>
			</ul>
		</li> 
		@endif
	</ul>
</aside>
	<div class="content-wrapper">
		<div class="container-fluid" id="content">
			@yield('content')
		</div>
	</div>
@section('script')
<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('semantic/js/semantic.min.js')}}"></script>
<script type="text/javascript">
var content = $('#content');
var loading = "<img src='{{asset('images/loading.gif')}}'>";
	
	$(document).ready(function(){	

		$(document).on('click','.loadContent',function(e){
			e.preventDefault();
			var  url = $(this).attr('href');
		
			content.html(loading);
			content.load(url,null,function(){
				content.hide();
				content.fadeIn(400);
				window.load = loadChart();
			});
		});
		$(document).on('click','.pagination li a',function(e){
			e.preventDefault();
			var  url = $(this).attr('href');
				content.html(loading);
				content.load(url,function(){
				window.load = loadChart();
			});
		});
		$(document).on('submit','.dataSubmit',function(e){
			e.preventDefault();
			var url = $(this).attr('action');
			content.html(loading);
			$.post(url,$(this).serialize(),function(data){
				content.html(data);
			});
		});
		$(document).on('submit','.dataGet',function(e){
			e.preventDefault();
			var url = $(this).attr('action');
		
			content.html(loading);
			$.get(url,$(this).serialize(),function(data){
				content.html(data);
			});
		});
		$(document).on('mouseover','body',function(){
			$('.alert-float').delay(3000).slideUp('slow');
		});
	});
</script>
@show
</body>
</html>