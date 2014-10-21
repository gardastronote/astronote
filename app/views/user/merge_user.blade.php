@extends('layout.dashboard')
@section('content')
@if($update)
<div class="row" style="margin-top:-18px;">
	<ol class="breadcrumb">
		<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><i class="fa fa-wrench"></i> Pengaturan User</li>
	</ol>
</div>
<div style="margin-bottom:10px" class="row">
	<div class="col-md-12 text-center">
		<div class="col-lg-12 alert alert-warning">
			<h5><span class="glyphicon glyphicon-exclamation-sign"></span> Jika password tidak di ubah, Password tidak perlu di isi</h5>
		</div>
	</div>
</div>
@endif
@if(!$update)
	<div class="row" style="margin-top:-18px;">
	<ol class="breadcrumb">
		<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="{{url('/user')}}" class="loadContent"><i class="fa fa-users"></i> Daftar Users</a></li>
		<li class="active"><i class="fa fa-plus"></i> Tambah User</li>
	</ol>
</div>
@endif
<div class="row">
	<div class="col-md-12">
		@if(!isset($load)) <?php $load = '' ?> @endif
		{{Form::open(['url'=>$url,'class'=>"form-horizontal $load",'files'=>true])}}
		<div class="form-group @if($errors->has('username')) has-error @endif">
			{{Form::label('username','User Name',['class'=>'col-md-4 control-label'])}}
			<div class="col-md-4">
				{{Form::text('username',isset($user)?$user->username:'',['class'=>'form-control input-lg'])}}
			</div>
			@if($errors->has('username'))
			<div class="col-md-4">
				<p class="help-block">{{$errors->first('username')}}</p>
			</div>
			@endif
		</div>
		<div class="form-group @if($errors->has('full_name')) has-error @endif">
			{{Form::label('full_name','Full Name',['class'=>'col-md-4 control-label'])}}
			<div class="col-md-4"> 
				{{Form::text('full_name',isset($user)?$user->full_name:'',['class'=>'form-control input-lg'])}}
			</div>
			@if($errors->has('full_name'))
			<div class="col-md-4">
				<p class="help-block">{{$errors->first('full_name')}}</p>
			</div>
			@endif
		</div>
		<div class="form-group @if($errors->has('email')) has-error @endif">
			{{Form::label('email','Email',['class'=>'col-md-4 control-label'])}}
			<div class="col-md-4"> 
				{{Form::email('email',isset($user)?$user->email:'',['class'=>'form-control input-lg'])}}
			</div>
			@if($errors->has('email'))
			<div class="col-md-4">
				<p class="help-block">{{$errors->first('email')}}</p>
			</div>
			@endif
		</div>
		<div class="form-group @if($errors->has('password')) has-error @endif">
			{{Form::label('password','Password',['class'=>'col-md-4 control-label'])}}
			<div class="col-md-4"> 
				{{Form::password('password',['class'=>'form-control input-lg'])}}
			</div>
			@if($errors->has('password'))
			<div class="col-md-4">
				<p class="help-block">{{$errors->first('password')}}</p>
			</div>
			@endif
		</div>
		<div class="form-group @if($errors->has('re_password')) has-error @endif">
			{{Form::label('re_password','Repeat Password',['class'=>'col-md-4 control-label'])}}
			<div class="col-md-4"> 
				{{Form::password('re_password',['class'=>'form-control input-lg'])}}
			</div>
			@if($errors->has('re_password'))
			<div class="col-md-4">
				<p class="help-block">{{$errors->first('re_password')}}</p>
			</div>
			@endif
		</div>
		<div class="form-group @if($errors->has('avatar')) has-error @endif">
			<div class="col-md-4">
				@if(isset($user))
				<img class="avatar pull-right ava-form" src="{{asset('avatar/'.$user->avatar)}}">
					@if($user->avatar !== 'default.png')
					<a class="pull-right" href="{{url('/user/deleteAvatar/'.$user->id.'/'.$type)}}">Hapus</a>
					@endif
				@endif
			</div>
			<div class="col-md-4"> 
				{{Form::file('avatar','',['class'=>'form-control input-lg'])}}
			</div>
			@if($errors->has('avatar'))
			<div class="col-md-4">
				<p class="help-block">{{$errors->first('avatar')}}</p>
			</div>
			@endif
		</div>
		<div class="form-group">
			<div class="col-md-4 col-md-offset-4">
				@if(isset($user))
				{{Form::hidden('id',$user->id)}}
				@endif
				{{Form::hidden('type',$type)}}
				{{Form::submit($button,['class'=>'btn btn-success btn-lg'])}}
			</div>
		</div>
		{{Form::close()}}
	</div>
</div>
@stop