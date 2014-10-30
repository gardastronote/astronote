@extends('layout.dashboard')
@section('content')
@include('notif')
<div class="row margin-top-breadcrumb">
	<ol class="breadcrumb">
		<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="/pengaturan_data_pelatihan" class="loadContent"><i class="fa fa-institution"></i> Daftar Pelatihan</a></li>
		<li class="active"><i class="fa fa-institution"></i>
			@if(strlen($pelatihan->pelatihan)>10)
			<?php $nama = substr_replace($pelatihan->pelatihan,'...', 17); ?>
			@else
			<?php $nama = $pelatihan->pelatihan ?>
			@endif
			{{$nama}}
		</li>
	</ol>
</div>
<div class="fixed-btn btn-right">
	<a class="btn btn-success loadContent" href="{{url('/belum_pelatihan/'.$id.'/data')}}"><span class="glyphicon glyphicon-user"></span></a>
</div>
@if(count($pelatihans)>0)
<div style="margin-top:45px" class="fixed-btn btn-right">
	<a class="btn btn-primary" href="{{url('/excel_pelatihan_data',$id)}}"><span class="glyphicon glyphicon-download-alt"></span></a>
</div>
@endif
<div class="row">
	<div class="col-md-12">
		@if(!count($pelatihans)>0)
		<h1 class="text-center">Belum ada yang mengikuti pelatihan ini</h1>
		@else
		<div class="col-md-10 col-md-offset-1 text-center">
			<h3>{{$pelatihan->pelatihan}}</h3>
			<h1><small>{{$count}} Orang mengikuti pelatihan ini</small></h1>
			{{$pelatihans->appends(Input::all())->links()}}
		</div>
		<table class="table table-condensed table-striped">
			<thead>
				<tr>
					<th class="text-center">NIP</th>
					<th>Nama</th>
					<th class="text-center">Grade</th>
					<th>Unit</th>
					<th class="text-center"><span class="glyphicon glyphicon-calendar"></span></th>
					<td class="text-center"><span class="glyphicon glyphicon-list"></span></td>
					<th><span class="glyphicon glyphicon-tasks"></span></th>
				</tr>
			</thead>
			<tbody>
				@foreach($pelatihans as $pel)
				<tr>
					<td class="text-center">{{$pel->pegawai->nip}}</td>
					<td>{{$pel->pegawai->nama}}</td>
					<td class="text-center">{{$pel->pegawai->grade->grade}}</td>
					<td>{{$pel->pegawai->unit->unit}}</td>
					<td class="text-center">{{$pel->tanggal}}</td>
					<td class="text-center"><a href="{{url('/data_pelatihan/'.$pel->pegawai->id)}}" class="loadContent"><span class="glyphicon glyphicon-search"></span></a></td>
					<td class="dropdown">
						<a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-chevron-down"></span></a>
						<ul class="dropdown-menu pull-right">
							<li><a class="dropdown-delete loadDelete" href="/delete_data_pelatihan/{{$pel->id_pegawai}}/{{$pel->id}}?id_pelatihan={{$pelatihan->id}}"><span class="glyphicon glyphicon-trash"></span> Hapus</a></li>
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
@stop