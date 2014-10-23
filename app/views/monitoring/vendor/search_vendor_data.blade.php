@extends('layout.dashboard')
@section('content')
<div class="row">
	<ol class="breadcrumb">
		<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="/vendor" class="loadContent"><i class="fa fa-link"></i> Vendors</a></li>
		<li class="active"><span class="glyphicon glyphicon-search"></span> Search Vendor</li>
	</ol>
</div>
@include('monitoring.vendor.search_data_vendor')
@include('monitoring.vendor.vendor_data')
@stop