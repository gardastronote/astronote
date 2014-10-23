<!DOCTYPE html>
<html>
<head>
	<title>Diklat BJB</title>
	<link rel="icon" type="icon/ico" href="{{asset('images/favicon.ico')}}">
	@section('style')
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/datepicker/datepicker3.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
	@show
	<script type="text/javascript" src="{{asset('js/jquery-2.1.1.min.js')}}"></script>
</head>
<body onload="loadChart()">
<nav class="navbar navbar-inverse navbar-fixed-top">
	<a href="{{url('/')}}" class="brand-logo navbar-brand"><img src="{{asset('images/logo_bjb/logo_diklat(putih).png')}}"></a>
	<ul class="nav navbar-nav pull-right">
		@if(Auth::user()->access == ADMIN)
		<li class="dropdown">
			<a data-toggle="dropdown" href="#"><i class="caret"></i> User <i class="fa fa-users"></i></a>
			<ul class="dropdown-menu">
				<li><a class="dropdown-success loadContent" href="{{url('/user/add')}}"><i class="fa fa-user"></i> Tambah User</a></li>
				<li class="divider"></li>
				<li><a class="dropdown-update loadContent" href="{{url('/user')}}"><i class="fa fa-users"></i> Daftar User</a></li>
			</ul>
		</li>
		@endif
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="caret"></i> {{Auth::user()->full_name}} <img class="avatar" src="{{asset('avatar/'.Auth::user()->avatar)}}"></a>
			<ul class="dropdown-menu pull-right">
				<li><a class="dropdown-update loadContent" href="{{url('/user/setting')}}"><span class="glyphicon glyphicon-cog"></span> Pengaturan</a></li>
				<li><a class="dropdown-delete" href="{{action('AppController@logout')}}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
		</li>
	</ul>
</nav>
<!--SIDEBAR-->
<aside class="navbar-inverse collapse navbar-collapse navbar-ex1-collapse">
	<ul class="nav navbar-nav side-nav">
		<li><a id="home" href="/dashboard" class="loadContent"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
		<li>
			<a href="#" data-toggle="collapse" data-target="#vendor-menu"><i class="fa fa-link"></i> Daftar Vendor<i class="caret"></i></a>
			<ul id="vendor-menu" class="dropdown-side collapse">
				<li><a href="/vendor" class="loadContent"><i class="fa fa-link"></i>  Vendor</a></li>
				<li><a href="/vendor/pelatihan" class="loadContent"><i class="fa fa-book"></i> Pelatihan</a></li>
				<li><a href="/vendor/catering" class="loadContent"><i class="glyphicon glyphicon-cutlery"></i> Catering</a></li>
				<li><a href="/vendor/hotel" class="loadContent"><i class="fa fa-building"></i> Hotel</a></li>
				<li><a href="/vendor/chart" class="loadContent"><i class="fa fa-line-chart"></i> Chart</a></li>
			</ul>
		</li>
		<li>
			<a href="#" data-toggle="collapse" data-target="#top-vendor"><i class="caret"></i> <i class="fa fa-star"></i> Vendor Terbaik</a>
			<ul id="top-vendor" class="dropdown-side collapse">
				<li><a href="/vendor/top?jenis=pelatihan&&bulan={{date('n')}}&&tahun={{date('Y')}}" class="loadContent"><i class="fa fa-book"></i> Top Pelatihan</a></li>
				<li><a href="/vendor/top?jenis=catering&&bulan={{date('n')}}&&tahun={{date('Y')}}" class="loadContent"><i class="glyphicon glyphicon-cutlery"></i> Top Catering</a></li>
				<li><a href="/vendor/top?jenis=hotel&&bulan={{date('n')}}&&tahun={{date('Y')}}" class="loadContent"><i class="fa fa-building"></i> Top Hotel</a></li>
			</ul>
		</li>
		<li>
			<a href='#' data-toggle="collapse" data-target="#data_pegawai"><i class="fa fa-users"></i> Daftar Pegawai<i class="caret"></i></a>
			<ul id="data_pegawai" class="dropdown-side collapse">
				<li><a class="loadContent" id="pegawai" href="/data_pegawai"><i class="fa fa-user"></i> Daftar Pegawai</a></li>
				<li><a class="loadContent" href="/pengaturan_data_pegawai"><i class="fa fa-cog"></i> Atur Data Pegawai</a></li>
			</ul>
		</li>
		<li>
			<a href='#' data-toggle="collapse" data-target="#data_pelatihan"><i class="fa fa-institution"></i> Daftar Pelatihan<i class="caret"></i> </a>
			<ul id="data_pelatihan" class="dropdown-side collapse">
				<li><a class="loadContent" href="/pengaturan_data_pelatihan"> <i class="fa fa-institution"></i> Daftar Pelatihan</a></li>
				<li><a class="loadContent" id="pegawai" href="/pelatihan"> <span class="glyphicon glyphicon-tasks"></span> Data Pelatihan</a></li>
			</ul>
		</li> 
	</ul>
</aside>
<!--SIDEBAR OVER-->
	<div class="content-wrapper">
		<div class="container-fluid" id="content">
			@yield('content')
		</div>
	</div>
@section('script')
<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript">
var content = $('#content');
var loading = "<img style=\"margin-left:45%;margin-top:20%;\" src='{{asset('images/loading.gif')}}'>";
	
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