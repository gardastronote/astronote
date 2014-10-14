@extends('layout.dashboard')
@section('content')
@if($update)
<div style="margin-bottom:10px" class="row">
	<div class="col-md-12 text-center">
		<h5><span class="glyphicon glyphicon-exclamation-sign"></span> Jika password tidak di ubah, Password tidak perlu di isi</h5>
	</div>
</div>
@endif
<div class="row">
	<div class="col-md-12">
		{{Form::open(['url'=>$url,'class'=>'form-horizontal','files'=>true])}}
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
				<img class="avatar pull-right ava-form" src="{{asset('avatar/'.$user->avatar)}}">
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
				{{Form::submit($button,['class'=>'btn btn-success btn-lg'])}}
			</div>
		</div>
		{{Form::close()}}
	</div>
</div>
@stop