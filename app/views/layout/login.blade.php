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
		 <img class="logo-bjb" src="{{asset('images/logo_bjb/logo_bjb(putih).png')}}"></img>
		 <h4>Service Excellent - Professionalism - Intellegence - Respect - Integrity - Trust</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
			@if(Session::has('alert'))
			<div class="alert @if(Session::has('alert.error')) alert-error @endif)">
			 <p class="help-block alert-danger text-uppercase">{{Session::pull('alert.error')}}</p>
			</div> 
			@endif
			{{Form::open(['url'=>'/login','class'=>'form-horizontal'])}}
			<!--USERNAME-->
			<div class="form-group @if($errors->has('username')) has-error @endif">
			 <div class="input-group">
			  <div class="input-group-addon white"><span class="glyphicon glyphicon-user "></span></div>	
				{{Form::text('username','',['class'=>'form-control input-lg','placeholder'=>'Username'])}}
			 </div>
			 @if($errors->has('username'))<p class="help-block alert-danger round-bottom">{{$errors->first('username')}}</p>@endif	
			</div>
			<!--USERNAME OVER-->
			
			<!--PASSWORD-->
			<div class="form-group @if($errors->has('password')) has-error @endif">
			 <div class="input-group">
			  <div class="input-group-addon white"><span class="glyphicon glyphicon-lock"></span></div> 
				{{Form::password('password',['class'=>'form-control input-lg','placeholder'=>'Password'])}}
			 </div>		
				@if($errors->has('password'))<p class="help-block alert-danger round-bottom">{{$errors->first('password')}}</p>@endif
			</div>
			<!--PASSWORD OVER-->
			
			<div class="form-group"> 
				{{Form::submit('Login',['class'=>'btn btn-block btn-info btn-lg'])}}
			</div>
			{{Form::close()}}
		</div>
	</div>
</div>
</body>
</html>