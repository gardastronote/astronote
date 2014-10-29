@extends('layout.dashboard')
@section('content')
 	<div class="row">
   		<div class="col-md-6 pull-left">
			<ul class="list-group">
				<li class="list-group-item text-center">
					<div class="dropdown btn-top-right">
					<a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span><i class="caret"></i></a>
					<ul class="dropdown-menu pull-right">
						<li><a class="dropdown-update loadContent" href="{{url('/user/setting')}}"><span class="glyphicon glyphicon-cog"></span> Pengaturan</a></li>
						<li><a class="dropdown-delete" href="{{action('AppController@logout')}}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					</ul>
					</div>
					<h3><img class="welcome-avatar" src="{{asset('avatar/'.Auth::user()->avatar)}}"> {{Auth::user()->full_name}}</h3>
				</li>
				<li class="list-group-item"><span class="glyphicon glyphicon-envelope"></span> <strong>Email:</strong>
					@if(empty(Auth::user()->email))
					Belum di tentukan
					@else
					{{Auth::user()->email}}
					@endif
				</li>
			</ul>
		</div>
		<div class="col-md-6 pull-right text-center">
			<h2><span class="glyphicon glyphicon-calendar"></span> {{date('l, d F Y')}}</h2>
			<h1 style="font-size:4em"><span class="glyphicon glyphicon-time"></span> <span id="time"></span></h1>
    	</div>
    	<script>
		function startTime() {
		    var today=new Date();
		    var h=today.getHours();
		    var m=today.getMinutes();
		    var s=today.getSeconds();
		    m = checkTime(m);
		    s = checkTime(s);
		    document.getElementById('time').innerHTML = h+":"+m+":"+s;
		    var t = setTimeout(function(){startTime()},500);
		}

		function checkTime(i) {
		    if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
		    return i;
		}
		window.onload = startTime();
		</script>
	</div>
   <hr/>
   <div class="row">
		<div class="col-md-12">
	        <ol class="breadcrumb">
	        	<li><h4><i class="fa fa-link"></i> Daftar Vendor</h4></li>
	        </ol>
	    </div>
	</div>	
  <div class="row">

  	<!--Pelatihan-->
	<div class="col-lg-4 col-md-4">
		<div class="panel panel-green">
			<a href="/vendor/pelatihan" to-active="pelatihan" to-side="vendor" class="linkClick loadContent">
		 	<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-book fa-5x"></i>	
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{$count_pelatihan}}</div>
						<div><span class="glyphicon glyphicon-thumbs-up"></span> {{round($pelatihan,2)}}</div>
						<div>Vendor Pelatihan</div>
					</div>
				</div>	
			</div>
		</a>
			<a href="/vendor/pelatihan" to-active="pelatihan" to-side="vendor" class="linkClick loadContent">
			<div class="panel-footer">
				<span class="pull-left">Lihat Selengkapnya</span>
				<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div>	
			</div>
		 	</a>
		</div>
	</div><!--Kotak pelatihan over-->

	<!--Catering-->
	<div class="col-lg-4 col-md-4">
		<div class="panel panel-red">
			<a href="/vendor/catering" to-active="catering" to-side="vendor" class="loadContent linkClick">
		 	<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="glyphicon glyphicon-cutlery fa-5x"></i>	
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{$count_catering}}</div>
						<div><span class="glyphicon glyphicon-thumbs-up"></span> {{round($catering,2)}}</div>
						<div>Vendor Catering</div>
					</div>
				</div>	
			</div>
		</a>
			<a href="/vendor/catering" to-active="catering" to-side="vendor" class="linkClick loadContent">
			<div class="panel-footer">
				<span class="pull-left">Lihat Selengkapnya</span>
				<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div>	
			</div>
		 	</a>
		</div>
	</div><!--Kotak catering over-->

   	<!--Hotel-->
	<div class="col-lg-4 col-md-4">
		<div class="panel panel-orange">
			<a href="/vendor/hotel" to-active="hotel" to-side="vendor" class="loadContent linkClick">
		 	<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-building fa-5x"></i>	
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{$count_hotel}}</div>
						<div><span class="glyphicon glyphicon-thumbs-up"></span> {{round($hotel,2)}}</div>
						<div>Vendor Hotel</div>
					</div>
				</div>	
			</div>
		</a>
			<a href="/vendor/hotel" to-active="hotel" to-side="vendor" class="linkClick loadContent">
			<div class="panel-footer">
				<span class="pull-left">Lihat Selengkapnya</span>
				<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div>	
			</div>
		 	</a>
		</div>
	</div><!--Kotak hotel over-->
</div><!--Row over-->

<div class="row">
	<!--Pelatihan-->
	<div class="col-lg-4 col-md-4">
		<div class="panel panel-primary">
			<a href="#" to-active="pelatihan" to-side="vendor" class="linkClick loadContent">
		 	<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-users fa-5x"></i>	
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">1200</div>
						<div>Data Pegawai</div>
					</div>
				</div>	
			</div>
		</a>
			<a href="/vendor/pelatihan" to-active="pelatihan" to-side="vendor" class="linkClick loadContent">
			<div class="panel-footer">
				<span class="pull-left">Lihat Selengkapnya</span>
				<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div>	
			</div>
		 	</a>
		</div>
	</div><!--Kotak pelatihan over-->

	<!--Pelatihan-->
	<div class="col-lg-4 col-md-4">
		<div class="panel panel-primary">
			<a href="#" to-active="pelatihan" to-side="vendor" class="linkClick loadContent">
		 	<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-institution fa-5x"></i>	
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">3000</div>
						<div>Data Pelatihan</div>
					</div>
				</div>	
			</div>
		</a>
			<a href="/vendor/pelatihan" to-active="pelatihan" to-side="vendor" class="linkClick loadContent">
			<div class="panel-footer">
				<span class="pull-left">Lihat Selengkapnya</span>
				<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div>	
			</div>
		 	</a>
		</div>
	</div><!--Kotak pelatihan over-->

	<!--Pelatihan-->
	<div class="col-lg-4 col-md-4">
		<div class="panel panel-primary">
			<a href="#" to-active="pelatihan" to-side="vendor" class="linkClick loadContent">
		 	<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-book fa-5x"></i>	
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">14</div>
						<div>Pelatihan Bulan Ini</div>
					</div>
				</div>	
			</div>
		</a>
			<a href="/vendor/pelatihan" to-active="pelatihan" to-side="vendor" class="linkClick loadContent">
			<div class="panel-footer">
				<span class="pull-left">Lihat Selengkapnya</span>
				<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div>	
			</div>
		 	</a>
		</div>
	</div><!--Kotak pelatihan over-->
</div><!---Row Over-->

	<!--Row-->
	<div class="row">
		<div class="row">
			<div class="col-md-12">
		        <ol class="breadcrumb">
		        	<li><h4><i class="fa fa-bar-chart-o fa-fw"></i> Chart Penilaian Vendor dalam 12 Bulan</h4></li>
		        </ol>
		    </div>
		</div>
		<div class="col-lg-12">
					<!--CHART SPACE-->
					<canvas height="120" width="760" id="lineChart"></canvas>
					<script type="text/javascript" src="{{asset('js/Chart.js')}}"></script>
					<script type="text/javascript">

						//line chart
						var lineData = {
							labels : [
							@if(count($dates) == 1) 0, @endif
							@foreach ($dates as $date) {{'"'.$date->bulan.'"'}}, @endforeach
							],
							datasets : [{
										strokeColor: "rgba(0,0,0,1)",
										pointColor: "rgba(0,0,0,1)",
										data : [
										@if(count($dates) == 1) 0, @endif
										@foreach ($dates as $date) {{round($date->average,2)}}, @endforeach
										]
									}]
						}
						function loadChart(){
							var ctx = document.getElementById("lineChart").getContext('2d');
							window.myLine = new Chart(ctx).Line(lineData,{
								bezierCurve : false,
								datasetFill : false,
								responsive : true
							});
						}
						window.load = loadChart();

					</script>
					<style type="text/css">
					body{
						overflow-x:hidden;
					}
					</style>
		</div>
	</div><!--Row over-->
	<hr/>
	<div class="row">
		<div class="col-md-12">
	        <ol class="breadcrumb">
	        	<li><h4><i class="fa fa-star"></i> Vendor Terbaik Bulan Ini</h4></li>
	        </ol>
	    </div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h3 class="text-center">Pelatihan</h3>
			@if(!count($top_pelatihan)>0)
			<h4 style="margin-top:50px" class="text-center">Belum ada Kegiatan</h4>
			@else
			<table class="table">
				<thead>
					<th><i class="fa fa-book"></i> Vendor</th>
					<th class="text-center"><span class="glyphicon glyphicon-thumbs-up"></span></th>
				</thead>
				<tbody>
					@foreach($top_pelatihan as $pelatihan_top)
					<tr>
						<td>{{$pelatihan_top->vendor_data->nama}}</td>
						<td class="text-center">{{round($pelatihan_top->nilai,2)}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@endif
		</div>
		<div class="col-md-4">
			<h3 class="text-center">Catering</h3>
			@if(!count($top_catering)>0)
			<h4 style="margin-top:50px" class="text-center">Belum ada Kegiatan</h4>
			@else
			<table class="table">
				<thead>
					<th><span class="glyphicon glyphicon-cutlery"></span> Catering</th>
					<th class="text-center"><span class="glyphicon glyphicon-thumbs-up"></span></th>
				</thead>
				<tbody>
					@foreach($top_catering as $catering_top)
					<tr>
						<td>{{$catering_top->vendor_data->nama}}</td>
						<td class="text-center">{{round($catering_top->nilai,2)}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@endif
		</div>
		<div class="col-md-4">
			<h3 class="text-center">Hotel</h3>
			@if(!count($top_hotel)>0)
			<h4 style="margin-top:50px" class="text-center">Belum ada Kegiatan</h4>
			@else
			<table class="table">
				<thead>
					<th><span class="fa fa-building"></span> Vendor</th>
					<th class="text-center"><span class="glyphicon glyphicon-thumbs-up"></span></th>
				</thead>
				<tbody>
					@foreach($top_hotel as $hotel_top)
					<tr>
						<td>{{$hotel_top->vendor_data->nama}}</td>
						<td class="text-center">{{round($hotel_top->nilai,2)}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@endif
		</div>
	</div><!--Row over-->
	<hr/>
	<div class="row">
		<div class="col-md-12">
	        <ol class="breadcrumb">
	        	<li><h4><i class="fa fa-institution"></i> Data Pelatihan Bulan Ini</h4></li>
	        </ol>
	    </div>
	</div>
	<div class="row">
		<div class="col-md-12">
			@if(!count($pelatihans)>0)
			<h2 class="text-center">Belum ada pelatihan Bulan ini</h2>
			@else
			<table class="table">
				<thead>
					<th>Nama</th>
					<th>Grade</th>
					<th>Unit</th>
					<th>Pelatihan</th>
				</thead>
				<tbody>
					@foreach($pelatihans as $pelatihan)
					<tr>
						<td>{{$pelatihan->pegawai->nama}}</td>
						<td>{{$pelatihan->pegawai->grade->grade}}</td>
						<td>{{$pelatihan->pegawai->unit->unit}}</td>
						<td>{{$pelatihan->pelatihan->pelatihan}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@endif
		</div>
	</div><!--Row over-->

@stop