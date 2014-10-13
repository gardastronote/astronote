@extends('layout.dashboard')
@section('content')
<div class="fixed-btn">
	<a class="btn btn-info btn-lg circle-fly loadContent" href="{{$back}}"><span class="glyphicon glyphicon-chevron-left"></span></a>
</div>
@include('monitoring.vendor.search_data_vendor_kegiatan')
@include('monitoring.vendor.kegiatan_data_vendor')
@stop