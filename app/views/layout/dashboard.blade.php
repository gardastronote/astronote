<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8" />
	<title>Diklat BJB</title>
	<link rel="icon" type="icon/ico" href="{{asset('images/favicon.ico')}}">
	@section('style')
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/credit.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/datepicker/datepicker3.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
	@show
	<script type="text/javascript" src="{{asset('js/jquery-2.1.1.min.js')}}"></script>
</head>
<body onload="loadChart()">
<nav class="navbar navbar-inverse navbar-fixed-top">
	<a href="{{url('/dashboard')}}" class="brand-logo navbar-brand"><img src="{{asset('images/logo_bjb/logo_diklat(putih).png')}}"></a>
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
		<li class="side-link active"><a style="padding-left:25px;" id="home" href="/dashboard" class="loadContent drop-click dropdown-active"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
		<li class="side-link side-vendor">
			<a href="#" data-toggle="collapse" data-target="#vendor-menu"><i class="caret"></i> <i class="fa fa-link"></i> Daftar Vendor</a>
			<ul id="vendor-menu" class="dropdown-side collapse">
				<li><a href="/vendor" class="target-vendor loadContent drop-click"><i class="fa fa-link"></i>  Vendor</a></li>
				<li><a href="/vendor/pelatihan" class="target-pelatihan loadContent drop-click"><i class="fa fa-book"></i> Pelatihan</a></li>
				<li><a href="/vendor/catering" class="target-catering loadContent drop-click"><i class="glyphicon glyphicon-cutlery"></i> Catering</a></li>
				<li><a href="/vendor/hotel" class="target-hotel loadContent drop-click"><i class="fa fa-building"></i> Hotel</a></li>
				<li><a href="/vendor/chart" class="target-chart loadContent drop-click"><i class="fa fa-line-chart"></i> Chart</a></li>
			</ul>
		</li>
		<li class="side-link side-kegiatan">
			<a href="#" data-toggle="collapse" data-target="#top-vendor"><i class="caret"></i> <i class="fa fa-tasks"></i> Kegiatan Vendor </a>
			<ul id="top-vendor" class="dropdown-side collapse">
				<li><a href="/vendor/top?jenis=pelatihan&&bulan={{date('n')}}&&tahun={{date('Y')}}" class="target-kegiatan-pelatihan loadContent drop-click"><i class="fa fa-book"></i> Kegiatan Pelatihan</a></li>
				<li><a href="/vendor/top?jenis=catering&&bulan={{date('n')}}&&tahun={{date('Y')}}" class="target-kegiatan-catering loadContent drop-click"><i class="glyphicon glyphicon-cutlery"></i> Kegiatan Catering</a></li>
				<li><a href="/vendor/top?jenis=hotel&&bulan={{date('n')}}&&tahun={{date('Y')}}" class="target-kegiatan-hotel loadContent drop-click"><i class="fa fa-building"></i> Kegiatan Hotel</a></li>
			</ul>
		</li>
		<li class="side-link side-pelatihan">
			<a href='#' data-toggle="collapse" data-target="#data_pelatihan"><i class="caret"></i> <i class="fa fa-list"></i> Pelatihan &amp; Pegawai </a>
			<ul id="data_pelatihan" class="dropdown-side collapse">
				<li><a class="target-data_pelatihan loadContent drop-click" href="/pengaturan_data_pelatihan"> <i class="fa fa-institution"></i> Daftar Pelatihan</a></li>
				<li><a class="target-data_pegawai loadContent drop-click" id="pegawai" href="/data_pegawai"><i class="fa fa-users"></i> Daftar Pegawai</a></li>
				<li><a class="target-kegiatan_pelatihan loadContent drop-click" id="pegawai" href="{{url('/kegiatan_pelatihan?bulan='.date('n').'&&'.'tahun='.date('Y'))}}"> <i class="fa fa-book"></i> Data Pelatihan</a></li>
				<li><a class="target-pengaturan_pegawai loadContent drop-click" href="/pengaturan_data_pegawai"><i class="fa fa-cog"></i> Atur Data Pegawai</a></li>
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
	<div class="modal fade" id="ask">
		<div class="modal-dialog">
			<div class="modal-content text-center">
				<div class="modal-body">
					<h2>Anda yakin ingin menghapus data ini?</h2>
					<p><span class="glyphicon glyphicon-warning-sign yellow"></span> Jika di hapus, data tidak akan kembali</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger hapus" onclick="return true" data-dismiss="modal">Ya</button>
					<button class="btn btn-default nohapus" data-dismiss="modal">Tidak</button>
				</div>
			</div>
		</div>
	</div>

@include('credit')
@section('script')
<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript">
var content = $('#content');
var loading = "<img style=\"margin-left:45%;margin-top:20%;\" src='{{asset('images/loading.gif')}}'>";
var errorLoad =
"<div style=\"margin-top:20%\" class=\"col-md-8 col-md-offset-2\"><div style=\"color:rgba(255,0,0,.7);border-radius:10px\" class=\"jumbotron\"><h2 class=\"text-center\">Terjadi Masalah pada server</h2><p class=\"text-center\">Hubungi Admin untuk Lebih lanjut</p><div class=\"text-center\"><a class=\"btn btn-success loadContent\" href=\"/dashboard\">Dashboard</a> <a data-toggle=\"modal\" data-target=\"#credit\" href=\"#\">Contact us</a></div></div></div>";	
	$(document).ready(function(){

		$(document).on('click','.loadContent',function(e){
			e.preventDefault();
			var  url = $(this).attr('href');
			content.html(loading);
			content.load(url,null,function(responseText,textStatus,XMLHttpRequest){
				if(textStatus == 'error'){
					content.html(errorLoad);
				}else{
					content.hide();
					content.fadeIn(400);
					window.load = loadChart();
				}
			});
		});	

		$(document).on('click','.loadDelete',function(e){
			e.preventDefault();
			var fixDel = confirm('Anda ingin menghapus data ini?');
			if(fixDel){
				var  url = $(this).attr('href');
				content.html(loading);
				content.load(url,null,function(responseText,textStatus,XMLHttpRequest){
					if(textStatus == 'error'){
						content.html(errorLoad);
					}
					content.hide();
					content.fadeIn(400);
					window.load = loadChart();
				});
			}
			$('button.nohapus').click(function(){
				url = null;
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
			}).fail(function(){
				content.html(errorLoad);
			});
		});
		$(document).on('submit','.dataGet',function(e){
			e.preventDefault();
			var url = $(this).attr('action');
		
			content.html(loading);
			$.get(url,$(this).serialize(),function(data){
				content.html(data);
			}).fail(function(){
				content.html(errorLoad);
			});;
		});
		$(document).on('mouseover','body',function(){
			$('.alert-float').delay(3000).slideUp('slow');
		});
		$('.side-link').click(function(){
			$('.side-link').removeClass('active');
			$(this).addClass('active');
		});
		$('.drop-click').click(function(){
			$('.drop-click').removeClass('dropdown-active');
			$(this).addClass('dropdown-active');
		});

		$(document).on('click','.linkClick',function(){
			var toActive = $(this).attr('to-active');
			var side = $(this).attr('to-side');
			side = '.side-'+side;
			$('#vendor-menu').collapse('show');
			$('.side-link').removeClass('active');
			$(side).addClass('active');
			toActive = '.target-'+toActive;
			$('.drop-click').removeClass('dropdown-active');
			$(toActive).addClass('dropdown-active');
		});

		$(document).on('click','.linkClick2',function(){
			var toActive = $(this).attr('to-active');
			var side = $(this).attr('to-side');
			side = '.side-'+side;
			$('#data_pelatihan').collapse('show');
			$('.side-link').removeClass('active');
			$(side).addClass('active');
			toActive = '.target-'+toActive;
			$('.drop-click').removeClass('dropdown-active');
			$(toActive).addClass('dropdown-active');
		});
	});
</script>
@show
</body>
</html>