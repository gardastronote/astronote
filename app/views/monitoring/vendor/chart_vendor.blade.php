@extends('layout.dashboard')
@section('content')
<div class="row">
	<ol class="breadcrumb">
		<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a>
		<li><a href="/vendor" class="loadContent"><i class="fa fa-link"></i> Vendors</a></li>
		<li class="active"><i class="fa fa-line-chart"></i> Chart</li>
	</ol>
</div>
<div class="row">
	<div class="col-md-12 text-center">
		<h3>Total Rata-rata penilaian vendor dalam 12 Bulan terakhir</h3>
		<canvas height="120" width="760" id="lineVendor"></canvas>
	</div>
</div>
<div class="row">
	<h3 class="text-center">Total Rata-rata penilaian vendor berdasarkan jenis</h3>
	<div class="col-md-6 text-center">
		<canvas height="200" width="200" id="donutVendor"></canvas>
	</div>
	<div class="col-md-6">
		<style type="text/css">
		.list-color{
			list-style-type: none;
			margin: 0;
			padding: 0;
		}
		.list-color li{
		}
		</style>
		<ul class="list-color">
			<li><h4><span style="width:20px;height:20px;border-radius:10px;display:inline-block;background-color:rgba(0,255,0,1)"></span> Pelatihan : {{$pelatihan}}</h4></li>
			<li><h4><span style="width:20px;height:20px;border-radius:10px;display:inline-block;background-color:rgba(255,0,0,1)"></span> Catering : {{$catering}}</h4></li>
			<li><h4><span style="width:20px;height:20px;border-radius:10px;display:inline-block;background-color:rgba(255,128,0,1)"></span> Hotel : {{$hotel}}</h4></li>
		</ul>
	</div>
</div>
<script type="text/javascript" src="{{asset('js/Chart.js')}}"></script>
<script type="text/javascript">
	var dataLine = {
		labels : [
		@if(count($dates) == 1) 0, @endif
		@foreach ($dates as $date) {{'"'.$date->bulan.'"'}}, @endforeach
		],
		datasets : [{
					strokeColor: "#000",
					pointColor: "rgba(0,0,0,1)",
					data : [
					@if(count($dates) == 1) 0, @endif
					@foreach ($dates as $date) {{round($date->average,2)}}, @endforeach
					]
				}]
	}
	var dataDonut = [
	{
		value : {{$pelatihan}},
		color : "rgba(0,255,0,1)",
		label : "Pelatihan"
	},
	{
		value : {{$catering}},
		color : "rgba(255,0,0,1)",
		label : "Catering"
	},
	{
		value : {{$hotel}},
		color : "rgba(255,128,0,1)",
		label : "Hotel"
	}
	];
	var donutVendor = document.getElementById('donutVendor').getContext('2d');
	var lineVendor = document.getElementById('lineVendor').getContext('2d');
	function loadChart(){
		window.donutVendorChart = new Chart(donutVendor).Doughnut(dataDonut);
		window.lineVendorChart = new Chart(lineVendor).Line(dataLine,{
			bezierCurve : false,
			datasetFill : false,
		});
	}
</script>
@stop