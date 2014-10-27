@extends('layout.dashboard')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">Total Rata-rata penilaian vendor dalam 12 Bulan terakhir</div >
			</div>
			<div class="panel-body">
				<canvas height="120" width="760" id="lineChart"></canvas>
			</div>	
		</div>
	</div>
</div>
<div class="row">
	<div class=" col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">Total Rata-rata penilaian vendor berdasarkan jenis</div >
			</div>
			<div class="panel-body">
				<div style="width:50%" class="text-center pull-left">
					<canvas height="200" width="200" id="donutVendor"></canvas>
				</div>
					<div style="width:50%" class="pull-left">
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
							<li><h4><span style="width:20px;height:20px;border-radius:10px;display:inline-block;background-color:rgba(255,0,0,1)"></span> Catering : {{round($catering,2)}}</h4></li>
							<li><h4><span style="width:20px;height:20px;border-radius:10px;display:inline-block;background-color:rgba(0,255,0,1)"></span> Pelatihan : {{round($pelatihan,2)}}</h4></li>
							<li><h4><span style="width:20px;height:20px;border-radius:10px;display:inline-block;background-color:rgba(255,128,0,1)"></span> Hotel : {{round($hotel,2)}}</h4></li>
						</ul>
					</div>
					<script type="text/javascript" src="{{asset('js/Chart.js')}}"></script>
					<script type="text/javascript">
						var dataDonut = [
							{
								value : {{round($pelatihan,2)}},
								color : "rgba(0,255,0,1)",
								label : "Pelatihan"
							},
							{
								value : {{round($catering,2)}},
								color : "rgba(255,0,0,1)",
								label : "Catering"
							},
							{
								value : {{round($hotel,2)}},
								color : "rgba(255,128,0,1)",
								label : "Hotel"
							}
							];
							var donutVendor = document.getElementById('donutVendor').getContext('2d');
							function loadChart(){
								window.donutVendorChart = new Chart(donutVendor).Doughnut(dataDonut,{
									animationSteps : 120,
								});
							}
					</script>
				</div>
			</div>	
		</div>
	</div><!--Row over-->

@stop