@extends('layout.dashboard')
@section('content')
<div class="row margin-top-breadcrumb">
	<ol class="breadcrumb">
		<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="/vendor" class="loadContent"><i class="fa fa-link"></i> Vendors</a></li>
		<li><a href="{{url('/vendor/'.$vendor->jenis)}}" class="loadContent"><i class="{{$jenis}}"></i> {{ucfirst($vendor->jenis)}}</a></li>
		<li><a href="{{url('/vendor/data/'.$vendor->id)}}" class="loadContent"><i class="{{$jenis}}"></i> {{$vendor->nama}}</a></li>
		<li class="active"><i class="glyphicon glyphicon-search"></i> {{$vendor->nama}} Kegiatan </li>
	</ol>
</div>
<div class="row">
	<div class="col-md-12 text-center">
		<h2><span class="glyphicon glyphicon-search"></span> {{$vendor->nama}}</h2>
	</div>
</div>
@include('monitoring.vendor.search_data_vendor_kegiatan')
@include('monitoring.vendor.kegiatan_data_vendor')
@stop