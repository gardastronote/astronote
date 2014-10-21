@extends('layout.dashboard')
@section('content')
@include('notif')
<div class="fixed-btn btn-right">
	<a class="btn btn-success loadContent" href="/vendor/add"><span class="glyphicon glyphicon-plus"></span></a>
</div>
	@foreach($vendors as $vendor)
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
	@endforeach
<div class="row margin-top-breadcrumb">
	<ol class="breadcrumb">
		<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a>
		<li><a href="/vendor" class="loadContent"><i class="fa fa-link"></i> Vendors</a></li>
		<li class="active">{{$glyph}} {{ucfirst($vendor->jenis)}}</li>
	</ol>
</div>
@include('monitoring.vendor.chart_data_vendor')
@include('monitoring.vendor.search_data_vendor')
@include('monitoring.vendor.vendor_data')
<script type="text/javascript">
	window.load = loadChart();
</script>
@stop