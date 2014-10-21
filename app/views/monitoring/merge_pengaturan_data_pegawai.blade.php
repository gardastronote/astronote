@extends('layout.dashboard')
@section('content')
<div class="row margin-top-breadcrumb">
	<ol class="breadcrumb">
		<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="/pengaturan_data_pegawai" class="loadContent"><i class="fa fa-cog"></i> Atur Data Pegawai</a></li>
		<li><a href="{{url('/pengaturan_data/'.$type)}}" class="loadContent"><i class="fa fa-cogs"></i> Pengaturan {{ucfirst($type)}}</a></li>
		<li class="active"><i class="fa fa-plus"></i> Alter Pengaturan {{ucfirst($type)}}</li>
	</ol>
</div>
<div class="row">
	<div class="col-md-12 text-center"> 
		{{Form::open(['url'=>$url,'method'=>'post','class'=>'form-inline dataSubmit','onsubmit'=>'return false'])}}
		<div class="form-group @if($errors->has($type)) has-error @endif">
			{{Form::text($type,isset($data)?$data->$type:'',['class'=>'form-control input-lg'])}}
		</div>
		<div class="form-group">
			{{Form::hidden('obj',$obj)}}
			{{Form::hidden('type',$type)}}
			@if(isset($data))
			{{Form::hidden('id',$data->id)}}
			@endif
			<button class="btn btn-success btn-lg" type="submit"><span class="glyphicon glyphicon-pencil"></span></button>
		</div>
		@if($errors->has($type))<p class="help-block">{{$errors->first($type)}}</p>@endif
		{{Form::close()}}
	</div>
</div>
@stop