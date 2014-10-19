@extends('layout.dashboard')
@section('content')
@include('notif')
<div class="fixed-btn btn-right">
	<a class="btn btn-success btn-flat btn-lg loadContent" href="/vendor/add"><span class="glyphicon glyphicon-plus"></span></a>
</div>
@include('monitoring.vendor.chart_data_vendor')
@include('monitoring.vendor.search_data_vendor')
@include('monitoring.vendor.vendor_data')
<script type="text/javascript">
	window.load = loadChart();
</script>
@stop