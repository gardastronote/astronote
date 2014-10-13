@extends('layout.dashboard')
@section('content')
<div class="fixed-btn">
	<a class="btn btn-info btn-lg circle-fly loadContent" href="{{$back}}"><span class="glyphicon glyphicon-chevron-left"></span></a>
</div>
<div class="fixed-btn btn-right">
	<a class="btn btn-success circle-fly btn-lg loadContent" href="/vendor/data/{{$id}}/add"><span class="glyphicon glyphicon-plus"></span></a>
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
@stop