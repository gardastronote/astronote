@extends('layout.dashboard')
@section('content')
@include('notif')
<div class="row margin-top-breadcrumb">
	<ol class="breadcrumb">
		<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><i class="fa fa-institution"></i> Daftar Pelatihan</li>
	</ol>
</div>
<div class="fixed-btn btn-right">
	<a href="/add_pengaturan_data_pelatihan" class="btn btn-success loadContent" onclick="return false;"><span class="glyphicon glyphicon-plus"></span></a>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="text-center">
			{{Form::open(['url'=>'/search_pengaturan_data_pelatihan','class'=>'form-inline dataGet center-form','method'=>'get','onsubmit'=>'return false'])}}
			<div class="form-group input-group @if($errors->has('pelatihan')) has-error @endif">
				{{Form::text('p','',['class'=>'input-lg form-control'])}}
				<div class="input-group-btn">
					<button class="btn btn-lg btn-info"><span class="glyphicon glyphicon-search"></span></button>
				</div>
			</div>
			{{Form::close()}}
		</div>
		<div>
			@if(!count($pelatihans)>0)
			<h1 class="text-center">Tidak ada pelatihan</h1>
			@else
			<div class="text-center">
				{{$pelatihans->links()}}
			</div>
			<table class="table table-condensed table-striped">
				<thead>
					<th class="text-center">Pelatihan</th>
					<th class="text-center"><span class="glyphicon glyphicon-list"></span></th>
					<th class="text-center"><span class="glyphicon glyphicon-tasks"></span></th>
				</thead>
			@foreach($pelatihans as $pelatihan)
				<tr>
					<td>{{$pelatihan->pelatihan}}</td>
					<td class="text-center"><a class="loadContent" href="{{url('/pelatihan',$pelatihan->id)}}"><span class="glyphicon glyphicon-search"></span></a></td>
					<td class="dropdown text-center">
						<a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-chevron-down"></span></a>
						<ul class="dropdown-menu pull-right">
							<li><a class="dropdown-update loadContent" href="{{url('/edit_pengaturan_data_pelatihan',$pelatihan->id)}}"><span class="glyphicon glyphicon-edit"></span> Ubah</a></li>
							<li><a class="dropdown-delete loadDelete" href="{{url('/delete_pengaturan_data_pelatihan/Pelatihan_pelatihan',$pelatihan->id)}}"><span class="glyphicon glyphicon-trash"></span> Hapus</a></li>
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
</div>
@stop