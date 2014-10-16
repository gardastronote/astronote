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
						<div class="huge">26</div>
						<div>Vendor Pelatihan</div>
					</div>
				</div>	
			</div>
		</a>
			<a href="/vendor/pelatihan" class="loadContent">
			<div class="panel-footer">
				<span class="pull-left">View Details</span>
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
   	  	 				<div class="huge">12</div>
   	  	 				<div>Vendor Catering</div>
   	  				</div>
   	  			</div>
   	 		 </div>
   	  		 <a href="/vendor/catering" class="loadContent">
   			  <div class="panel-footer">
   	  			<span class="pull-left">View Details</span>
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
						<div class="huge">36</div>
						<div>Vendor Hotel</div>
					</div>
				</div>	
			</div>
			<a href="/vendor/hotel" class="loadContent">
			<div class="panel-footer">
				<span class="pull-left">View Details</span>
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



					<!--CHART SPACE OVER-->
					<a href="/vendor/chart" class="loadContent">
							<div class="pull-right">
								View Detail <i class="fa fa-arrow-circle-right"></i>
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
								View Detail <i class="fa fa-arrow-circle-right"></i>
							</div>
						</a>
				</div>

			</div>	
		</div>
	</div><!--Row over-->




 </div><!--col md 12 over-->
</div>


@stop