@extends('layout.dashboard')
@section('content')
@include('notif')
<div class="fixed-btn btn-right">
	<a class="btn btn-success btn-flat btn-lg loadContent" href="/vendor/data/{{$id}}/add"><span class="glyphicon glyphicon-plus"></span></a>
</div>
<div class="dropdown btn-top-left">
	<a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-chevron-down"></span></a>
	<ul class="dropdown-menu">
		<li><a class="dropdown-update loadContent" href="{{url('/vendor/edit/'.$vendor->id)}}"><span class="glyphicon glyphicon-edit"></span> Ubah</a></li>
		<li><a class="dropdown-delete loadContent" href="{{url('/vendor/delete/'.$vendor->id)}}"><span class="glyphicon glyphicon-trash"></span> Hapus</a></li>
	</ul>
</div>
<div class="row">
	<div class="col-md-6">
		<h1>{{$vendor->nama}}</h1>
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
</script>
@stop