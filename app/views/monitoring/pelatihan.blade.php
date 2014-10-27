@extends('layout.dashboard')
@section('content')
<div class="row margin-top-breadcrumb">
	<ol class="breadcrumb">
		<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><i class="glyphicon glyphicon-tasks"></i> Data Pelatihan</li>
	</ol>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="text-center">
			{{Form::open(['url'=>'/search_pelatihan','class'=>'form-inline dataGet center-form','method'=>'get','onsubmit'=>'return false'])}}
			<div class="form-group input-group @if($errors->has('pelatihan')) has-error @endif">
				{{Form::text('p','',['class'=>'input-lg form-control'])}}
				<div class="input-group-btn">
					<button class="btn btn-lg btn-info"><span class="glyphicon glyphicon-search"></span></button>
				</div>
			</div>
			{{Form::close()}}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		@if(!count($pelatihans)>0)
		<h1 class="text-center">Belum ada yang mengikuti pelatihan ini</h1>
		@else
		<div class="text-center">
			{{$pelatihans->appends(Input::all())->links()}}
		</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Nama</th>
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
					<td>{{$pelatihan->pelatihan->pelatihan}}</td>
					<td class="text-center">{{$pelatihan->tanggal}}</td>					
					<td class="text-center"><a href="{{url('/data_pelatihan/'.$pelatihan->pegawai->id)}}" class="loadContent"><span class="glyphicon glyphicon-search"></span></a></td>
					<td class="dropdown">
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
@stop