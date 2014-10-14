@extends('layout.dashboard')
@section('content')
<div class="fixed-btn btn-right">
	<a data-content="Tambah Vendor" data-position="left center" data-variation="inverted" class="btn pop-fly btn-success circle-fly btn-lg loadContent" href="/vendor/add"><span class="glyphicon glyphicon-plus"></span></a>
</div>
@include('monitoring.vendor.chart_data_vendor')
@include('monitoring.vendor.search_data_vendor')
@include('monitoring.vendor.vendor_data')
<script type="text/javascript">
	window.load = loadChart();
</script>
@stop