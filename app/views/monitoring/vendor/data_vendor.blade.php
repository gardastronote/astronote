@extends('layout.dashboard')
@section('content')
<div class="row margin-top-breadcrumb">
	<ol class="breadcrumb">
		<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><i class="fa fa-link"></i> Vendors</li>
	</ol>
</div>
<div class="fixed-btn btn-right margin-top-plus toolTip" data-placement="left" title="Tambah Vendor" >
	<a data-content="Tambah Vendor" class="btn btn-success loadContent"  href="/vendor/add"><span class="glyphicon glyphicon-plus"></span> </a>
</div>
@include('monitoring.vendor.chart_data_vendor')
@include('monitoring.vendor.search_data_vendor')
@include('monitoring.vendor.vendor_data')
<script type="text/javascript">
	window.load = loadChart();
	$('.toolTip').tooltip();
</script>

@stop