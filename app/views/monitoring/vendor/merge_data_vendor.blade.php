@extends('layout.dashboard')
@section('content')
<div class="row margin-top-breadcrumb">
	<ol class="breadcrumb">
		<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="/vendor" class="loadContent"><i class="fa fa-link"></i> Vendors</a></li>
		<li class="active"><i class="fa fa-plus"></i> Alter Vendor</li>
	</ol>
</div>
<div class="row">
	<div class="col-md-12">
		{{Form::open(['url'=>$url,'class'=>'form-horizontal dataSubmit'])}}
		<div class="form-group @if($errors->has('nama')) has-error @endif ">
			{{Form::label('nama','Nama Vendor',['class'=>'col-md-4 control-label'])}}
			<div class="col-md-4"> 
				{{form::text('nama',isset($data->nama)?$data->nama:'',['class'=>'form-control input-lg'])}}
			</div>
			<div class="col-md-4"> 
				@if($errors->has('nama'))<p class="help-block">{{$errors->first('nama')}}</p>@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('nama')) has-error @endif ">
			{{Form::label('alamat','Alamat Vendor',['class'=>'col-md-4 control-label'])}}
			<div class="col-md-4"> 
				{{form::text('alamat',isset($data->alamat)?$data->alamat:'',['class'=>'form-control input-lg'])}}
			</div>
			<div class="col-md-4"> 
				@if($errors->has('alamat'))<p class="help-block">{{$errors->first('alamat')}}</p>@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('nama')) has-error @endif ">
			{{Form::label('phone','Nomor Telefon Vendor',['class'=>'col-md-4 control-label'])}}
			<div class="col-md-4"> 
				{{form::text('phone',isset($data->phone)?$data->phone:'',['class'=>'form-control input-lg'])}}
			</div>
			<div class="col-md-4"> 
				@if($errors->has('phone'))<p class="help-block">{{$errors->first('phone')}}</p>@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('nama')) has-error @endif ">
			{{Form::label('keterangan','Keterangan Vendor',['class'=>'col-md-4 control-label'])}}
			<div class="col-md-4"> 
				{{form::textarea('keterangan',isset($data->keterangan)?$data->keterangan:'',['class'=>'form-control input-lg','rows'=>'2'])}}
			</div>
			<div class="col-md-4"> 
				@if($errors->has('keterangan'))<p class="help-block">{{$errors->first('keterangan')}}</p>@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('jenis')) has-error @endif">
			{{Form::label('jenis','Jenis Vendor',['class'=>'col-md-4 control-label'])}}
			<div class="col-md-4"> 
				{{Form::select('jenis',[
				'pelatihan'=>'Pelatihan',
				'catering'=>'Catering',
				'hotel'=>'Hotel'
				],isset($data->jenis)?$data->jenis:'',['class'=>'form-control input-lg'])}}
			</div>
			<div class="col-md-4">
				@if($errors->has('jenis'))<p class="help-block">{{$errors->first('jenis')}}</p>@endif
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4 col-md-offset-4">
				@if(isset($data))
				{{Form::hidden('id',$data->id)}}
				@endif
				{{Form::submit($button,['class'=>'btn btn-success btn-lg'])}}
			</div>
		</div>
		{{Form::close()}}
	</div>
</div>
@stop