@extends('layout.dashboard')
@section('content')
<div class="row margin-top-breadcrumb">
	<ol class="breadcrumb">
		<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><i class="glyphicon glyphicon-tasks"></i> Data Pelatihan</li>
	</ol>
</div>
@if(count($pelatihans)>0)
<div class="fixed-btn btn-right">
	<a class="btn btn-primary" href="{{url('/download/pelatihan_data?bulan='.Input::get('bulan').'&&tahun='.Input::get('tahun'))}}"><span class="glyphicon glyphicon-download-alt"></span></a>
</div>
@endif
<div class="row">
	<div class="col-md-12">
		<div class="text-center">
			{{Form::open(['url'=>'/pelatihan','method'=>'get','class'=>'form-inline dataGet'])}}
			<div class="form-group">
				{{Form::text('bulan',Input::get('bulan'),['class'=>'form-control input-lg datepickerMonth','placeholder'=>'Bulan'])}}
			</div>
			<div class="form-group">
				{{Form::text('tahun',Input::get('tahun'),['class'=>'form-control input-lg datepickerYear','placeholder'=>'Tahun'])}}
			</div>
			<div class="form-group">
				<button class="btn btn-info btn-lg"><span class="glyphicon glyphicon-search"></span></button>
			</div>
			{{Form::close()}}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		@if(!count($pelatihans)>0)
		<h1 class="text-center">Tidak ada data</h1>
		@else
		<div class="text-center">
			{{$pelatihans->appends(Input::all())->links()}}
		</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Nama</th>
					<th class="text-center">Grade</th>
					<th>Unit</th>
					<th>Pelatihan</th>
					<th class="text-center"><span class="glyphicon glyphicon-calendar"></span></th>
					<th class="text-center"><span class="glyphicon glyphicon-list"></span></th>
					<th class="text-center"><span class="glyphicon glyphicon-tasks"></span></th>
				</tr>
			</thead>
			<tbody>
				@foreach($pelatihans as $pelatihan)
				<tr>
					<td>{{$pelatihan->pegawai->nama}}</td>
					<td class="text-center">{{$pelatihan->pegawai->grade->grade}}</td>
					<td>{{$pelatihan->pegawai->unit->unit}}</td>
					<td>{{$pelatihan->pelatihan->pelatihan}}</td>
					<td class="text-center">{{$pelatihan->tanggal}}</td>					
					<td class="text-center"><a href="{{url('/data_pelatihan/'.$pelatihan->pegawai->id)}}" class="loadContent"><span class="glyphicon glyphicon-search"></span></a></td>
					<td class="dropdown text-center">
						<a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-chevron-down"></span></a>
						<ul class="dropdown-menu pull-right">
							<li><a class="dropdown-update loadContent" href="{{url('/edit_data_pelatihan',$pelatihan->id)}}"><span class="glyphicon glyphicon-edit"></span> Ubah</a></li>
							<li><a class="dropdown-delete loadDelete" href="{{url('/delete_data_pelatihan/'.$pelatihan->id_pegawai,$pelatihan->id)}}"><span class="glyphicon glyphicon-trash"></span> Hapus</a></li>
						</ul>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{{$pelatihans->appends(Input::all())->links()}}
		</div>
		@endif
	</div>
</div>
<script type="text/javascript" src="{{asset('bootstrap/datepicker/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.datepickerMonth').datepicker({
			autoclose:true,
			minViewMode: "months",
			format:"mm",
			orientation: "top right"
			});
		$('.datepickerYear').datepicker({
			autoclose:true,
			minViewMode: "years",
			format:"yyyy",
			orientation: "top right",
			});
	});
</script>
@stop