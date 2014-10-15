@if(Session::has('alert.error') || Session::has('alert.success'))
<div class="alert-float text-center">
	<div class="alert @if(Session::has('alert.error')) alert-danger @else alert-success @endif">
		@if(Session::has('alert.error'))
		<strong><span class="glyphicon glyphicon-remove"></span> {{Session::pull('alert.error')}}</strong>
		@else
		<strong><span class="glyphicon glyphicon-ok"></span> {{Session::pull('alert.success')}}</strong>
		@endif
	</div>
</div>
@endif