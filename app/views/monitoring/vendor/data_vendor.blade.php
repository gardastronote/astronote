@extends('layout.dashboard')
@section('content')

<div class="fixed-btn btn-right">
	<a data-content="Tambah Vendor" class="btn btn-success btn-lg loadContent" href="/vendor/add"><span class="glyphicon glyphicon-plus"></span> </a>
</div>
<div class="row">
	<ol class="breadcrumb">
		<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a>
		<li><i class="fa fa-link"></i> Vendors</li>
	</ol>
</div>
@include('monitoring.vendor.chart_data_vendor')
@include('monitoring.vendor.search_data_vendor')
@include('monitoring.vendor.vendor_data')
<script type="text/javascript">
	window.load = loadChart();
</script>
@stop