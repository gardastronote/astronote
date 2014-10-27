@extends('layout.dashboard')
@section('content')

<div class="row ">
 <div class="col-md-12">
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
			<h2><span class="glyphicon glyphicon-calendar"></span> {{date('l d F Y')}}</h2>
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
   <hr>
   <div class="row ">
    <div class="col-lg-12">
        <ol class="breadcrumb">
        	<li class="active">
        		<a href="/vendor" class="loadContent">
                	<i class="fa fa-link"></i> Vendors
            	</a>
            </li>
        </ol>
    </div>
   </div>	
  <div class="row">

  	<!--Pelatihan-->
	<div class="col-lg-4 col-md-4">
		<div class="panel panel-green">
			<a href="/vendor/pelatihan" class="loadContent">
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
			<a href="/vendor/pelatihan" class="loadContent">
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
			<a href="/vendor/catering" class="loadContent">
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
			<a href="/vendor/catering" class="loadContent">
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
			<a href="/vendor/hotel" class="loadContent">
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
			<a href="/vendor/hotel" class="loadContent">
			<div class="panel-footer">
				<span class="pull-left">Lihat Selengkapnya</span>
				<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div>	
			</div>
		 	</a>
		</div>
	</div><!--Kotak hotel over-->
</div><!--Row over-->
	
	<!--Row-->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Chart Area</div>
				</div>
				<div class="panel-body">
					<!--CHART SPACE-->
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
									animationSteps : 130,
								});
							}
							window.onload = loadChart();
					</script>
					<!--CHART SPACE OVER-->
					<a href="/vendor/chart" class="loadContent">
						<div style="clear:both" class="pull-right">
							Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i>
						</div>
					</a>
				</div>
			</div>	
		</div>
	</div><!--Row over-->

	<div class="row">
		<h2 class="text-center">Kegiatan Vendor Terbaik Bulan Ini</h2>
		<div class="col-md-4">
			<h3 class="text-center">Pelatihan</h3>
			@if(!count($top_pelatihan)>0)
			<h3 class="text-center">Belum ada Kegiatan</h3>
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
			<h3 class="text-center">Belum ada Kegiatan</h3>
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
			<h3 class="text-center">Belum ada Kegiatan</h3>
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




 </div><!--col md 12 over-->
</div>


@stop