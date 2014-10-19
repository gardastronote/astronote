@extends('layout.dashboard')
@section('content')

<div class="row">
 <div class="col-md-12">
  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dashboard <small>Overview</small>
        </h1>
        <ol class="breadcrumb">
        	<li class="active">
                <i class="fa fa-link"></i> Vendors
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
   			 <div class="panel-heading">
   	  			<div class="row">
   	  				<div class="col-xs-3">
   	  	 				<i class="fa fa-spoon fa-5x"></i>
   	  				</div>
   	  				<div class="col-xs-9 text-right">
   	  	 				<div class="huge">{{$count_catering}}</div>
						<div><span class="glyphicon glyphicon-thumbs-up"></span> {{round($catering,2)}}</div>
   	  	 				<div>Vendor Catering</div>
   	  				</div>
   	  			</div>
   	 		 </div>
   	  		 <a href="/vendor/catering" class="loadContent">
   			  <div class="panel-footer">
   	  			<span class="pull-left">Lihat Selengkapnya</span>
   	  			<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
   	  			<div class="clearfix"></div>
   	 		  </div>	
   	 		 </a>
   		</div>
   	</div><!-- kotak catering over-->
   	<!--Hotel-->
	<div class="col-lg-4 col-md-4">
		<div class="panel panel-orange">
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
									animationSteps : 120,
								});
							}
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
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-users"></i> Data Pegawai</div>
				</div>
				<div class="panel-body">
					<!--Data Pegawai-->




					<!--Data Pegawai Over-->
						<a href="#">
							<div class="pull-right">
								Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i>
							</div>
						</a>
				</div>

			</div>	
		</div>
	</div><!--Row over-->




 </div><!--col md 12 over-->
</div>


@stop