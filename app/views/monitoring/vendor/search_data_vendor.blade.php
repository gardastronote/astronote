<div class="row">
	<div class="col-md-12 search-data text-center">
		{{Form::open(['url'=>'/vendor/search','method'=>'GET','class'=>'form-inline'])}}
		@if($choose)
		<div class="form-group">
			{{Form::select('jenis',[
			'pelatihan'=>'Pelatihan',
			'catering'=>'Catering',
			'hotel'=>'Hotel'
			],Input::get('jenis'),['class'=>'form-control input-lg'])}}
		</div>
		@endif
		<div class="form-group">
			{{Form::text('nama',Input::get('nama'),['class'=>'form-control input-lg'])}}
		</div>
		<div class="form-group">
			@if(isset($jenis))
			{{Form::hidden('jenis',$jenis)}}
			@endif
			<button class="btn btn-lg btn-info" type="submit"><span class="glyphicon glyphicon-search"></span></button>
		</div>
		{{Form::close()}}
	</div>
</div>