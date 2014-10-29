@extends('layout.dashboard')
@section('content')
<div class="row margin-top-breadcrumb">
	<ol class="breadcrumb">
		<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="/pengaturan_data_pelatihan" class="loadContent"><i class="fa fa-institution"></i> Daftar Pelatihan</a></li>
		<li class="active"><i class="fa fa-plus"></i> Alter Pelatihan</li>
	</ol>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="text-center">
			{{Form::open(['url'=>$url,'method'=>'post','class'=>'form-inline dataSubmit','onsubmit'=>'return false'])}}
			<div class="form-group @if($errors->has('pelatihan')) has-error @endif">
				{{Form::text('pelatihan',isset($data->pelatihan)?$data->pelatihan:'',['class'=>'form-control input-lg','placeholder'=>'Nama Pelatihan'])}}
			</div>
			<div class="form-group">
				@if(isset($data))
				{{Form::hidden('id',$data->id)}}
				@endif
				{{Form::submit($button,['class'=>'btn btn-success btn-lg'])}}
			</div>
			{{Form::close()}}
			@if($errors->has('pelatihan'))<p class="help-block">{{$errors->first('pelatihan')}}</p>@endif
		</div>
	</div>
</div>
@stop