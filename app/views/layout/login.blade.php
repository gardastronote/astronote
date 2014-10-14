<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 text-center">
			<h1>Diklat BJB</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
			@if(Session::has('alert'))
			<div class="alert @if(Session::has('alert.error')) alert-error @endif)">
			<p>{{Session::pull('alert.error')}}</p>
			</div> 
			@endif
			{{Form::open(['url'=>'/login','class'=>'form-horizontal'])}}
			<div class="form-group @if($errors->has('username')) has-error @endif">
				{{Form::text('username','',['class'=>'form-control input-lg','placeholder'=>'Username'])}}
			</div>
			<div class="form-group @if($errors->has('password')) has-error @endif"> 
				{{Form::password('password',['class'=>'form-control input-lg','placeholder'=>'Password'])}}
			</div>
			<div class="form-group"> 
				{{Form::submit('Login',['class'=>'btn btn-block btn-info btn-lg'])}}
			</div>
			{{Form::close()}}
		</div>
	</div>
</div>
</body>
</html>