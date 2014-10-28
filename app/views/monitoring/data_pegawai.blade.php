@extends('layout.dashboard')
@section('content')
@include('notif')
<div class="fixed-btn btn-right margin-top-plus toolTip" title="Tambah Pegawai" data-placement="left">
	<a href="/add_data_pegawai" class="btn btn-success loadContent" onclick="return false;"><span class="glyphicon glyphicon-plus"></span></a>
</div>
<div class="row margin-top-breadcrumb">
	<ol class="breadcrumb">
		<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><i class="fa fa-users"></i> Daftar Pegawai</li>
	</ol>
</div>
<div class="row">
	<div class="col-md-12 text-center">
		{{Form::open(['class'=>'form-inline dataGet center-form','onsubmit'=>'return false','action'=>'MonitoringController@search_data_pegawai','method'=>'get'])}}
		<div class="form-group">
			{{Form::select('type',[
			'nama'=>'Nama',
			'nip'=>'NIP',
			'grade'=>'Grade',
			'unit'=>'Unit'
			],Input::get('type'),['class'=>'form-control input-lg'])}}
		</div>
		<div class="form-group input-group">
			{{Form::text('q',Input::get('q'),['class'=>'form-control input-lg','placeholder'=>'Cari'])}}
			<div class="input-group-btn">
				<button type="submit" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-search"></span></button>
			</div>
		</div>
		{{Form::close()}}
	</div>
</div>
<div class="row">
	<div class="col-md-12"> 
		@if(!count($pegawai)>0)
		<h1 class="text-center">Tidak ada pegawai</h1>
		@else
		<div class="text-center">
			{{$pegawai->appends(Input::all())->links()}}
		</div>
		<table class="table table-condensed table-striped">
			<thead>
				<th class="text-center">NIP</th>
				<th>Nama</th>
				<th class="text-center">Grade</th>
				<th>Unit</th>
				<th class="text-center"><span class="glyphicon glyphicon-list"></span></th>
				<th class="text-center"><span class="glyphicon glyphicon-tasks"></span></th>
			</thead>
			@foreach($pegawai as $data)
			<tr>
				<td class="text-center">{{$data->nip}}</td>
				<td>{{$data->nama}}</td>
				<td class="text-center">{{$data->grade->grade}}</td>
				<td>{{$data->unit->unit}}</td>
				<td class="text-center"><a class="loadContent" onclick="return false" href="{{url('/data_pelatihan',$data->id)}}"><span class="glyphicon glyphicon-search"></span></a></td>
				
				<td class="text-center dropdown">
					<a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-chevron-down"></span></a>
					<ul class="dropdown-menu pull-right">
						<li><a class="dropdown-update loadContent" onclick="return false" href="{{action('MonitoringController@edit_data_pegawai',$data->id)}}"><span class="glyphicon glyphicon-edit"></span> Ubah</a></li>
						<li><a class="dropdown-delete loadDelete" href="{{action('MonitoringController@delete_data_pegawai',$data->id)}}"><span class="glyphicon glyphicon-trash"></span> Hapus</a></li>
					</ul>
				</td>
			@endforeach
		</table>
		<div class="text-center">
			{{$pegawai->appends(Input::all())->links()}}
		</div>
		@endif
	</div>
</div>
<script type="text/javascript">
$('.toolTip').tooltip();
</script>
@stop