@extends('layout.dashboard')
@section('content')
<div class="row margin-top-breadcrumb">
	<ol class="breadcrumb">
		<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a>
		<li><a href="/data_pegawai" class="loadContent"><i class="fa fa-users"></i> Daftar Pegawai</a></li>
		<li class="active"><i class="fa fa-plus"></i> Merge Pegawai</li>
	</ol>
</div>
<div class="row">
	<div class="col-md-12"> 
		{{Form::open(['url'=>isset($data)?'/edit_data_pegawai':$url,'class'=>'form-horizontal dataSubmit','onsubmit'=>'return false'])}}
		<div class="form-group @if($errors->has('nip')) has-error @endif">
			{{Form::label('nip','NIP',['class'=>'control-label col-sm-4'])}}
			<div class="col-sm-4"> 
				{{Form::text('nip',isset($data->nip)?$data->nip:'',['class'=>'form-control'])}}
			</div>
			<div class="col-sm-4"> 
				@if($errors->has('nip'))<p class="help-block">{{ucfirst($errors->first('nip'))}}</p>@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('nama')) has-error @endif">
			{{Form::label('nama','Nama',['class'=>'control-label col-sm-4'])}}
			<div class="col-sm-4"> 
				{{Form::text('nama',isset($data->nama)?$data->nama:'',['class'=>'form-control'])}}
			</div>
			<div class="col-sm-4"> 
				@if($errors->has('nama'))<p class="help-block">{{ucfirst($errors->first('nama'))}}</p>@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('grade')) has-error @endif">
			{{Form::label('grade','Grade',['class'=>'control-label col-sm-4'])}}
			<div class="col-sm-4"> 
				{{Form::select('id_grade',$grades,isset($data->grade)?$data->grade:'',['class'=>'form-control'])}}
			</div>
			<div class="col-sm-4"> 
				@if($errors->has('grade'))<p class="help-block">{{ucfirst($errors->first('grade'))}}</p>@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('title')) has-error @endif">
			{{Form::label('title','Title',['class'=>'control-label col-sm-4'])}}
			<div class="col-sm-4"> 
				{{Form::select('id_title',$titles,isset($data->title)?$data->title:'',['class'=>'form-control'])}}
			</div>
			<div class="col-sm-4"> 
				@if($errors->has('title'))<p class="help-block">{{ucfirst($errors->first('title'))}}</p>@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('job')) has-error @endif">
			{{Form::label('job','Job',['class'=>'control-label col-sm-4'])}}
			<div class="col-sm-4"> 
				{{Form::select('id_job',$jobs,isset($data->job)?$data->job:'',['class'=>'form-control'])}}
			</div>
			<div class="col-sm-4"> 
				@if($errors->has('job'))<p class="help-block">{{ucfirst($errors->first('job'))}}</p>@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('unit')) has-error @endif">
			{{Form::label('unit','Unit',['class'=>'control-label col-sm-4'])}}
			<div class="col-sm-4"> 
				{{Form::select('id_unit',$units,isset($data->unit)?$data->unit:'',['class'=>'form-control'])}}
			</div>
			<div class="col-sm-4"> 
				@if($errors->has('unit'))<p class="help-block">{{ucfirst($errors->first('unit'))}}</p>@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('penempatan')) has-error @endif">
			{{Form::label('penempatan','Penempatan',['class'=>'control-label col-sm-4'])}}
			<div class="col-sm-4"> 
				{{Form::select('id_penempatan',$penempatans,isset($data->penempatan)?$data->penempatan:'',['class'=>'form-control'])}}
			</div>
			<div class="col-sm-4"> 
				@if($errors->has('penempatan'))<p class="help-block">{{ucfirst($errors->first('penempatan'))}}</p>@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('jenis')) has-error @endif">
			{{Form::label('jenis','Jenis',['class'=>'control-label col-sm-4'])}}
			<div class="col-sm-4"> 
				{{Form::select('id_jenis',$jeniss,isset($data->jenis)?$data->jenis:'',['class'=>'form-control'])}}
			</div>
			<div class="col-sm-4"> 
				@if($errors->has('jenis'))<p class="help-block">{{ucfirst($errors->first('jenis'))}}</p>@endif
			</div>
		</div>
		<div class="form-group">
			{{Form::label('jkelamin','Jenis Kelamin',['class'=>'control-label col-sm-4'])}}
			<div class="col-sm-4"> 
				{{Form::select('jkelamin',[
				'L'=>'Laki-Laki',
				'P'=>'Perempuan'
				],isset($data->jkelamin)?$data->jkelamin:'',['class'=>'form-control'])}}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-4 col-sm-offset-4"> 
				@if(isset($data))
				{{FOrm::hidden('id',$data->id)}}
				@endif
				{{Form::submit($submit,['class'=>'btn btn-success'])}}
			</div>
		</div>
		{{Form::close()}}
	</div>
</div>
@stop