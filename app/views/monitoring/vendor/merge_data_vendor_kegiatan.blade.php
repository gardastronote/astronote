@extends('layout.dashboard')
@section('content')
<div class="row margin-top-breadcrumb">
	<ol class="breadcrumb">
		<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="/vendor" class="loadContent"><i class="fa fa-link"></i> Vendors</a></li>
		<li><a href="{{url('/vendor/'.$vendor->jenis)}}" class="loadContent"><i class="{{$jenis}}"></i> {{ucfirst($vendor->jenis)}}</a></li>
		<li><a href="{{url('/vendor/data/'.$vendor->id)}}" class="loadContent"><i class="{{$jenis}}"></i> {{$vendor->nama}}</a></li>
		<li><i class="fa fa-plus"></i> Alter Kegiatan </li>
	</ol>
</div>
<div class="row">
	<div class="col-md-12">
		{{Form::open(['url'=>$url,'class'=>'form-horizontal dataSubmit'])}}
		<div class="form-group @if($errors->has('kegiatan')) has-error @endif">
			{{Form::label('kegiatan','Kegiatan',['class'=>'control-label col-md-4'])}}
			<div class="col-md-4"> 
				{{Form::text('kegiatan',isset($data->kegiatan)?$data->kegiatan:'',['class'=>'form-control input-lg'])}}
			</div>
			<div class="col-md-4"> 
			@if($errors->has('kegiatan'))<p class="help-block">{{$errors->first('kegiatan')}}</p>@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('nilai')) has-error @endif">
			{{Form::label('nilai','Nilai',['class'=>'control-label col-md-4'])}}
			<div class="col-md-4"> 
				{{Form::text('nilai',isset($data->nilai)?round($data->nilai,2):'',['class'=>'form-control input-lg'])}}
			</div>
			<div class="col-md-4"> 
			@if($errors->has('nilai'))<p class="help-block">{{$errors->first('nilai')}}</p>@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('tanggal')) has-error @endif">
			{{Form::label('tanggal','Tanggal',['class'=>'control-label col-md-4'])}}
			<div class="col-md-4"> 
				{{Form::text('tanggal',isset($data->tanggal)?$data->tanggal:'',['class'=>'datepicker form-control input-lg'])}}
			</div>
			<div class="col-md-4"> 
			@if($errors->has('tanggal'))<p class="help-block">{{$errors->first('tanggal')}}</p>@endif
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4 col-md-offset-4"> 
				{{Form::hidden('id_vendor',isset($data->id_vendor)?$data->id_vendor:$id_vendor)}}
				@if(isset($data))
				{{Form::hidden('id',$data->id)}}
				@endif
				{{Form::submit($button,['class'=>'btn btn-success btn-lg'])}}
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="{{asset('bootstrap/datepicker/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.datepicker').datepicker({
			format:'yyyy-mm-dd',
			autoclose:true,
			todayHighlight:true,
			orientation: "top right"
			});
	});
</script>
@stop