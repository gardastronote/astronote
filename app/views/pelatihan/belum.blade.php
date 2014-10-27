@extends('layout.dashboard')
@section('content')
<div class="row">
	<div class="col-md-12 text-center">
		{{Form::open(['url'=>'/belum_pelatihan/'.$pelatihan->id.'/search','method'=>'get','class'=>'form-inline'])}}
		<div class="form-group">
			{{Form::select('type',[
			'nama'=>'Nama',
			'nip'=>'NIP',
			'grade'=>'Grade',
			'unit'=>'Unit'
			],Input::get('type'),['class'=>'form-control input-lg'])}}
		</div>
		<div class="form-group">
			{{Form::text('q',Input::get('q'),['class'=>'form-control input-lg'])}}
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-search"></span></button>
		</div>
		{{Form::close()}}
	</div>
</div>
<div class="row">
	<div class="col-md-12 text-center">
		{{$pegawais->links()}}
	</div>
</div>
<div class="row">
	<h4 class="text-center">Daftar Pegawai yg belum mengikuti pelatihan <br/> {{$pelatihan->pelatihan}}</h4>
	<div class="col-md-12">
		@if(!count($pegawais)>0)
		<h1 class="text-center">Tidak ada pegawai</h1>
		@else
		<table class="table">
			<thead>
				<th>NIP</th>
				<th>Nama</th>
				<th class="text-center">Grade</th>
				<th>Unit</th>
				<th class="text-center"><span class="glyphicon glyphicon-list"></span></th>
			</thead>
			<tbody>
				@foreach($pegawais as $pegawai)
				<tr>
					<td>{{$pegawai->nip}}</td>
					<td>{{$pegawai->nama}}</td>
					<td class="text-center">{{$pegawai->grade->grade}}</td>
					<td>{{$pegawai->unit->unit}}</td>
					<td class="text-center"><a href="{{url('/data_pelatihan/'.$pegawai->id)}}" class="loadContent"><span class="glyphicon glyphicon-search"></span></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@endif
	</div>
</div>
@stop