@extends('layout.dashboard')
@section('content')
@include('notif')
<div class="fixed-btn btn-right toolTip" data-placement="left" data-toggle="tooltip" data-placement="top" title="Tambah Kegiatan">
	<a class="btn btn-success loadContent toolTip"  href="/vendor/data/{{$id}}/add"><span class="glyphicon glyphicon-plus"></span></a>
</div>
@if(count($kegiatans)>0)
<div style="margin-top:50px" class="fixed-btn btn-right toolTip" data-placement="left" title="Download Excel">
	<a class="btn btn-primary" href="{{url('/vendor/data/'.$id.'/excel')}}"><span class="glyphicon glyphicon-download-alt"></span></a>
</div>
@endif
<div class="row margin-top-breadcrumb">
	<ol class="breadcrumb">
		<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="/vendor" class="loadContent"><i class="fa fa-link"></i> Vendors</a></li>
		<li><a href="{{url('/vendor/'.$vendor->jenis)}}" class="loadContent"><i class="{{$jenis}}"></i> {{ucfirst($vendor->jenis)}}</a></li>
		<li><i class="{{$jenis}}"></i> {{$vendor->nama}}</li>
	</ol>
</div>
		@if($vendor->jenis == 'pelatihan')
			<?php $jenis = 'success'; ?>
			<?php $glyph = '<i class="fa fa-book"></i>'; ?>
		@elseif($vendor->jenis == 'catering')
			<?php $jenis = 'danger'; ?>
			<?php $glyph = '<i class="glyphicon glyphicon-cutlery"></i>'; ?>
		@else
			<?php $jenis = 'warning'; ?>
			<?php $glyph = '<i class="fa fa-building"></i>'; ?>
		@endif

<div class="row">
	<div class="col-md-6">
		<div class="dropdown">
		<a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span><i class="caret"></i></a>
		<ul class="dropdown-menu">
			<li><a class="dropdown-update loadContent" href="{{url('/vendor/edit/'.$vendor->id)}}"><span class="glyphicon glyphicon-edit"></span> Ubah</a></li>
			<li><a class="dropdown-delete loadDelete" href="{{url('/vendor/delete/'.$vendor->id)}}"><span class="glyphicon glyphicon-trash"></span> Hapus</a></li>
		</ul>
		</div>
		<h1 class="text-center">{{$vendor->nama}}</h1>
	</div>
	<div class="col-md-6">
		<ul class="list-group">
			<li class="list-group-item"><span class="glyphicon glyphicon-map-marker"></span>
				@if(empty($vendor->alamat))
				Alamat Belum di tentukan
				@else
				{{$vendor->alamat}}
				@endif
			</li>
			<li class="list-group-item"><span class="glyphicon glyphicon-phone-alt"></span>
				@if(empty($vendor->phone))
				Contact Belum di tentukan
				@else
				{{$vendor->phone}}
				@endif
			</li>
			<li class="list-group-item"><span class="glyphicon glyphicon-comment"></span>
				@if(empty($vendor->keterangan))
				Tidak ada keterangan
				@else
				{{$vendor->keterangan}}
				@endif
			</li>
			<li class="list-group-item">{{$glyph}} {{$total}} Kegiatan {{ucfirst($vendor->jenis)}}</li>
		</ul>
	</div>
</div> 
@if(!count($kegiatans)>0)
<div class="row">
	<div class="col-md-12">
		<h1 class="text-center">Tidak ada kegiatan</h1>
	</div>
</div>
@else
@include('monitoring.vendor.chart_data_vendor_kegiatan')
@include('monitoring.vendor.search_data_vendor_kegiatan')
@include('monitoring.vendor.kegiatan_data_vendor')
@endif
<script type="text/javascript">
	window.load = loadChart();
	$('.toolTip').tooltip();
</script>

@stop