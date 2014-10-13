<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 text-center">
			@if(Session::has('alert'))
			<div class="alert @if(Session::has('alert.error')) alert-error @endif)">
			<p>{{Session::pull('alert.error')}}</p>
			</div> 
			@endif
			{{Form::open(['url'=>'/login','class'=>'form-horizontal'])}}
			<div class="form-group @if($errors->has('username')) has-error @endif">
				{{Form::label('username','User Name',['class'=>'control-label col-md-4'])}}
				<div class="col-md-4"> 
					{{Form::text('username','',['class'=>'form-control'])}}
				</div>
				<div class="col-md-4"> 
					@if($errors->has('username'))<p class="help-block">{{$errors->first('username')}}</p>@endif
				</div>
			</div>
			<div class="form-group @if($errors->has('password')) has-error @endif">
				{{Form::label('username','User Name',['class'=>'control-label col-md-4'])}}
				<div class="col-md-4"> 
					{{Form::password('password',['class'=>'form-control'])}}
				</div>
				<div class="col-md-4"> 
					@if($errors->has('password'))<p class="help-block">{{$errors->first('password')}}</p>@endif
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-4 col-md-offset-4 text-left"> 
					{{Form::submit('Login',['class'=>'btn btn-info'])}}
				</div>
			</div>
			{{Form::close()}}
		</div>
	</div>
</div>
</body>
</html>