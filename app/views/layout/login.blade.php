<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/credit.css')}}">
	<script type="text/javascript" src="{{asset('js/jquery-2.1.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>
<div class="container">
	<div class="background-rgba">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 text-center">
		 <img class="logo-bjb" src="{{asset('images/logo_bjb/logo_diklat(putih).png')}}"></img>
		 <h4>Service Excellent - Professionalism - Intellegence - Respect - Integrity - Trust</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
			@if($errors->has('username') || $errors->has('password'))
			<div class="alert alert-danger">
				 <p>Username / Password Harus di isi</p>
			</div> 
			@elseif(Session::has('alert.error'))
			<div class="alert alert-danger">
				 <p>{{Session::pull('alert.error')}}</p>
			</div>
			@endif
			{{Form::open(['url'=>'/login','class'=>'form-horizontal'])}}
			<!--USERNAME-->
			<div class="form-group">
			 <div class="input-group">
			  <div class="input-group-addon white"><span class="glyphicon glyphicon-user "></span></div>	
				{{Form::text('username','',['class'=>'form-control input-lg','placeholder'=>'Username'])}}
			 </div>
			</div>
			<!--USERNAME OVER-->
			
			<!--PASSWORD-->
			<div class="form-group">
			 <div class="input-group">
			  <div class="input-group-addon white"><span class="glyphicon glyphicon-lock"></span></div> 
				{{Form::password('password',['class'=>'form-control input-lg','placeholder'=>'Password'])}}
			 </div>		
			</div>
			<!--PASSWORD OVER-->
			
			<div class="form-group"> 
				{{Form::submit('Login',['class'=>'btn btn-block btn-info btn-lg'])}}
			</div>
			{{Form::close()}}
		</div>
	</div>
	</div>
</div>
<div class="astro-dev">
	<p>&copy; <strong><a data-toggle="modal" data-target="#credit" href="#">Art Stream of Note</a></strong> <img src="{{asset('/images/astro-note.png')}}"></p>
</div>
@include('credit')
</body>
</html>