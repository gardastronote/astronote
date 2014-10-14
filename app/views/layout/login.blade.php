<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-4 text-center">
			@if(Session::has('alert'))
			<div class="alert @if(Session::has('alert.error')) alert-error @endif)">
			<p>{{Session::pull('alert.error')}}</p>
			</div> 
			@endif
			{{Form::open(['url'=>'/login','class'=>'form-horizontal'])}}
			<!--USERNAME-->
			<div class="form-group @if($errors->has('username')) has-error @endif">
			 <div class="col-md-4">
			  <div class="input-group">
			   <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
			    <input class="form-control input-lg" placeholder="User Name" name="username" type="password">
			  </div>
				@if($errors->has('username'))<p class="help-block alert-danger">{{$errors->first('username')}}</p>@endif
		     </div>
			</div>
			<!--USERNAME OVER-->
			
			<!--PASSWORD-->
			<div class="form-group @if($errors->has('password')) has-error @endif">
			 <div class="col-md-4"> 
			  <div class="input-group">
			   <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>	
				<input class="form-control input-lg" placeholder="Password" name="password" type="password">
			  </div>
				@if($errors->has('password'))<p class="help-block alert-danger">{{$errors->first('password')}}</p>@endif
			 </div>
			</div>
			<!--PASSWORD  OVER-->



			<div class="form-group">
				<div class="col-md-4"> 
					<button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
				</div>
			</div>
			{{Form::close()}}
		</div>
	</div>
</div>
</body>
</html>