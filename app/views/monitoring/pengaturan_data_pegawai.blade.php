@extends('layout.dashboard')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active"><i class="fa fa-cog"></i> Atur Data Pegawai</li>
			</ol>
		</div>
	</div>
	<div class="col-md-6 ">
		<div>
			<div class="list-group">
				<a class="list-group-item add-list loadContent text-center" onclick="return false" href="{{url('/add_pengaturan_data_pegawai/Pegawai_grade/grade')}}">
					<span class="glyphicon glyphicon-plus"></span> <b>Tambah data Grade</b>
				</a>
			@if(count($grades)>0)
				@foreach($grades as $grade)
				<div class="list-group-item">
					{{$grade->grade}}
					<a class="pull-right" href="#" data-toggle="dropdown"> 
						<span class="glyphicon glyphicon-cog"></span>
					</a>
					<ul class="pull-right dropdown-menu">
						<li><a class="dropdown-update loadContent" href="{{route('edit_pengaturan_data_pegawai','Pegawai_grade/grade/'.$grade->id)}}" onclick="return false"><span class="glyphicon glyphicon-pencil"></span> Ubah</a></li>
						<li><a class="dropdown-delete loadContent" href="{{route('delete_pengaturan_data_pegawai','Pegawai_grade/'.$grade->id)}}"><span class="glyphicon glyphicon-trash"></span> Hapus</a></li>
					</ul>
				</div>
				@endforeach
				@if(Pegawai_grade::count() > 5)
				<div class="list-group-item">
					<a href="{{url('/pengaturan_data/grade')}}" class="btn btn-block btn-primary loadContent">Lihat Semua</a>
				</div>
				@endif
			@else
			<h1>Tidak ada data</h1>
			@endif
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div>
			<div class="list-group">
				<a class="list-group-item add-list loadContent text-center" onclick="return false" href="{{url('/add_pengaturan_data_pegawai/Pegawai_jenis/jenis')}}">
					<span class="glyphicon glyphicon-plus"></span> <b>Tambah data Jenis</b>
				</a>
			@if(count($jeniss)>0)
				@foreach($jeniss as $jenis)
				<div class="list-group-item">
					{{$jenis->jenis}}
					<a class="pull-right" href="#" data-toggle="dropdown"> 
						<span class="glyphicon glyphicon-cog"></span>
					</a>
					<ul class="pull-right dropdown-menu">
						<li><a class="dropdown-update loadContent" href="{{route('edit_pengaturan_data_pegawai','Pegawai_jenis/jenis/'.$jenis->id)}}" onclick="return false"><span class="glyphicon glyphicon-pencil"></span> Ubah</a></li>
						<li><a class="dropdown-delete loadContent" href="{{route('delete_pengaturan_data_pegawai','Pegawai_jenis/'.$jenis->id)}}"><span class="glyphicon glyphicon-trash"></span> Hapus</a></li>
					</ul>
				</div>
				@endforeach
				@if(Pegawai_jenis::count() > 5)
				<div class="list-group-item">
					<a href="{{url('/pengaturan_data/jenis')}}" class="btn btn-block btn-primary loadContent">Lihat Semua</a>
				</div>
				@endif
			@else
			<h1>Tidak ada data</h1>
			@endif
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div>
			<div class="list-group">
				<a class="list-group-item add-list loadContent text-center" onclick="return false" href="{{url('/add_pengaturan_data_pegawai/Pegawai_job/job')}}">
					<span class="glyphicon glyphicon-plus"></span> <b>Tambah data Job</b>
				</a>
			@if(count($jobs)>0)
				@foreach($jobs as $job)
				<div class="list-group-item">
					{{$job->job}}
					<a class="pull-right" href="#" data-toggle="dropdown"> 
						<span class="glyphicon glyphicon-cog"></span>
					</a>
					<ul class="pull-right dropdown-menu">
						<li><a class="dropdown-update loadContent" href="{{route('edit_pengaturan_data_pegawai','Pegawai_job/job/'.$job->id)}}" onclick="return false"><span class="glyphicon glyphicon-pencil"></span> Ubah</a></li>
						<li><a class="dropdown-delete loadContent" href="{{route('delete_pengaturan_data_pegawai','Pegawai_job/'.$job->id)}}"><span class="glyphicon glyphicon-trash"></span> Hapus</a></li>
					</ul>
				</div>
				@endforeach
				@if(Pegawai_job::count() > 5)
				<div class="list-group-item">
					<a href="{{url('/pengaturan_data/job')}}" class="btn btn-block btn-primary loadContent">Lihat Semua</a>
				</div>
				@endif
			@else
			<h1>Tidak ada data</h1>
			@endif
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div>
			<div class="list-group">
				<a class="list-group-item add-list loadContent text-center" onclick="return false" href="{{url('/add_pengaturan_data_pegawai/Pegawai_penempatan/penempatan')}}">
					<span class="glyphicon glyphicon-plus"></span> <b>Tambah data Penempatan</b>
				</a>
			@if(count($penempatans)>0)
				@foreach($penempatans as $penempatan)
				<div class="list-group-item">
					{{$penempatan->penempatan}}
					<a class="pull-right" href="#" data-toggle="dropdown"> 
						<span class="glyphicon glyphicon-cog"></span>
					</a>
					<ul class="pull-right dropdown-menu">
						<li><a class="dropdown-update loadContent" href="{{route('edit_pengaturan_data_pegawai','Pegawai_penempatan/penempatan/'.$penempatan->id)}}" onclick="return false"><span class="glyphicon glyphicon-pencil"></span> Ubah</a></li>
						<li><a class="dropdown-delete loadContent" href="{{route('delete_pengaturan_data_pegawai','Pegawai_penempatan/'.$penempatan->id)}}"><span class="glyphicon glyphicon-trash"></span> Hapus</a></li>
					</ul>
				</div>
				@endforeach
				@if(Pegawai_penempatan::count() > 5)
				<div class="list-group-item">
					<a href="{{url('/pengaturan_data/penempatan')}}" class="btn btn-block btn-primary loadContent">Lihat Semua</a>
				</div>
				@endif
			@else
			<h1>Tidak ada data</h1>
			@endif
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div>
			<div class="list-group">
				<a class="list-group-item add-list loadContent text-center" onclick="return false" href="{{url('/add_pengaturan_data_pegawai/Pegawai_title/title')}}">
					<span class="glyphicon glyphicon-plus"></span> <b>Tambah data Title</b>
				</a>
			@if(count($titles)>0)
				@foreach($titles as $title)
				<div class="list-group-item">
					{{$title->title}}
					<a class="pull-right" href="#" data-toggle="dropdown"> 
						<span class="glyphicon glyphicon-cog"></span>
					</a>
					<ul class="pull-right dropdown-menu">
						<li><a class="dropdown-update loadContent" href="{{route('edit_pengaturan_data_pegawai','Pegawai_title/title/'.$title->id)}}" onclick="return false"><span class="glyphicon glyphicon-pencil"></span> Ubah</a></li>
						<li><a class="dropdown-delete loadContent" href="{{route('delete_pengaturan_data_pegawai','Pegawai_title/'.$title->id)}}"><span class="glyphicon glyphicon-trash"></span> Hapus</a></li>
					</ul>
				</div>
				@endforeach
				@if(Pegawai_title::count() > 5)
				<div class="list-group-item">
					<a href="{{url('/pengaturan_data/title')}}" class="btn btn-block btn-primary loadContent">Lihat Semua</a>
				</div>
				@endif
			@else
			<h1>Tidak ada data</h1>
			@endif
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div>
			<div class="list-group">
				<a class="list-group-item add-list loadContent text-center" onclick="return false" href="{{url('/add_pengaturan_data_pegawai/Pegawai_unit/unit')}}">
					<span class="glyphicon glyphicon-plus"></span> <b>Tambah data Unit</b>
				</a>
			@if(count($units)>0)
				@foreach($units as $unit)
				<div class="list-group-item">
					{{$unit->unit}}
					<a class="pull-right" href="#" data-toggle="dropdown"> 
						<span class="glyphicon glyphicon-cog"></span>
					</a>
					<ul class="pull-right dropdown-menu">
						<li><a class="dropdown-update loadContent" href="{{route('edit_pengaturan_data_pegawai','Pegawai_unit/unit/'.$unit->id)}}" onclick="return false"><span class="glyphicon glyphicon-pencil"></span> Ubah</a></li>
						<li><a class="dropdown-delete loadContent" href="{{route('delete_pengaturan_data_pegawai','Pegawai_unit/'.$unit->id)}}"><span class="glyphicon glyphicon-trash"></span> Hapus</a></li>
					</ul>
				</div>
				@endforeach
				@if(Pegawai_unit::count() > 5)
				<div class="list-group-item">
					<a href="{{url('/pengaturan_data/unit')}}" class="btn btn-block btn-primary loadContent">Lihat Semua</a>
				</div>
				@endif
			@else
			<h1>Tidak ada data</h1>
			@endif
			</div>
		</div>
	</div>
</div>
@stop