@extends('layout.dashboard')
@section('content')
@include('notif')
<div class="row margin-top-breadcrumb">
	<ol class="breadcrumb">
		<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="/data_pegawai" class="loadContent"><i class="fa fa-users"></i> Daftar Pegawai</a></li>
		<li class="active"><i class="fa fa-user"></i> {{$pegawai->nama}}</li>
	</ol>
</div>
@if(count($pelatihans)>0)
<div style="margin-top:50px" class="fixed-btn btn-right toolTip" data-placement="left" title="Download Excel">
	<a class="btn btn-primary" href="{{url('/excel_data_pelatihan',$id_pegawai)}}"><span class="glyphicon glyphicon-download-alt"></span></a>
</div>
@endif
<div class="fixed-btn btn-right toolTip" title="Tambah Pelatihan" data-placement="left">
	<a class="btn btn-success loadContent" href="{{url('/add_data_pelatihan',$id_pegawai)}}"><span class="glyphicon glyphicon-plus"></span></a>
</div>	
<div class="row">
	<div class="col-md-6">
		<div class="dropdown">
		<a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-cog "></span><i class="caret fa-2x"></i>
			<ul class="dropdown-menu">
				<li><a class="dropdown-update loadContent" href="{{action('MonitoringController@edit_data_pegawai',$pegawai->id)}}"><span class="glyphicon glyphicon-edit"></span> Ubah</a></li>
				<li><a class="dropdown-delete loadDelete" href="{{action('MonitoringController@delete_data_pegawai',$pegawai->id)}}"><span class="glyphicon glyphicon-trash"></span> Hapus</a></li>
			</ul>
		</div>
		<h1 class="text-center">{{$pegawai->nama}}</h1>
		<h1 class="text-center"><small>{{$pegawai->nip}}</small>
	</div>
	<div class="col-md-6">
		<ul class="list-group">
			<li class="list-group-item">
				<strong>Grade:</strong> {{$pegawai->grade->grade}}
			</li>
			<li class="list-group-item">
				<strong>Title:</strong> {{$pegawai->title->title}}
			</li>
			<li class="list-group-item">
				<strong>Job:</strong> {{$pegawai->job->job}}
			</li>
			<li class="list-group-item">
				<strong>Unit:</strong> {{$pegawai->unit->unit}}
			</li>
			<li class="list-group-item">
				<strong>Penempatan:</strong> {{$pegawai->penempatan->penempatan}}
			</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-md-12 center-form text-center">
		{{Form::open(['url'=>'/search_data_pelatihan','method'=>'GET','class'=>'form-inline dataGet','onsubmit'=>'return false'])}}
		<div class="form-group input-group">
			{{Form::text('pelatihan','',['class'=>'form-control input-lg','placeholder'=>'Cari Pelatihan'])}}
			<div class="input-group-btn">
				{{Form::hidden('p',$id_pegawai)}}
				<button type="submit" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-search"></span></button>
			</div>
		</div>
		{{Form::close()}}
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		@if(!count($pelatihans)>0)
		<h1 class="text-center">Tidak ada data pelatihan</h1>
		@else
		<div class="text-center">
			{{$pelatihans->appends(Input::all())->links()}}
		</div>
		<table class="table table-condensed table-striped">
			<thead  class="text-center">
				<th><i class="fa fa-book"></i> Pelatihan</th>
				<th class="text-center"><span class="glyphicon glyphicon-calendar"></span></th>
				<th class="text-center">Lama (Hari)</th>
				<th class="text-center"><span class="glyphicon glyphicon-home"></span></th>
				<th>No Surat Tugas</th>
				<th class="text-center">Lulus/Tidak</th>
				<th class="text-center">Score</th>
				<th><span class="glyphicon glyphicon-tasks"></span></th>
			</thead>
			@foreach($pelatihans as $pelatihan)
			<tr>
				<td>{{$pelatihan->pelatihan->pelatihan}}</td>
				<td class="text-center">{{$pelatihan->tanggal}}</td>
				<td class="text-center">{{$pelatihan->lama}}</td>
				<td class="text-center">{{$pelatihan->tempat}}</td>
				<td>{{$pelatihan->no_surat_penugasan}}</td>
				<td class="text-center">{{$pelatihan->lulus}}</td>
				<td class="text-center">{{$pelatihan->score}}</td>
				<td class="dropdown">
					<a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-chevron-down"></span></a>
					<ul class="dropdown-menu pull-right">
						<li><a class="dropdown-update loadContent" href="{{url('/edit_data_pelatihan',$pelatihan->id)}}"><span class="glyphicon glyphicon-edit"></span> Ubah</a></li>
						<li><a class="dropdown-delete loadDelete" href="{{url('/delete_data_pelatihan/'.$pelatihan->id_pegawai,$pelatihan->id)}}"><span class="glyphicon glyphicon-trash"></span> Hapus</a></li>
					</ul>
				</td>
			</tr>
			@endforeach
		</table>
		<div class="text-center">
			{{$pelatihans->links()}}
		</div>
		@endif
	</div>
</div>
<script type="text/javascript">
$('.toolTip').tooltip();
</script>
@stop