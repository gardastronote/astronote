<div class="row">
	<div class="col-md-12 search-data text-center">
		{{Form::open(['url'=>'/vendor/search','method'=>'GET','class'=>'form-inline dataGet'])}}
		@if($choose)
		<div class="form-group">
			{{Form::select('jenis',[
			'pelatihan'=>'Pelatihan',
			'catering'=>'Catering',
			'hotel'=>'Hotel'
			],Input::get('jenis'),['class'=>'form-control input-lg'])}}
		</div>
		@endif
		<div class="form-group input-group">
			{{Form::text('nama',Input::get('nama'),['class'=>'form-control input-lg'])}}

			@if(isset($jenis))
			{{Form::hidden('jenis',$jenis)}}
			@endif
			<span class="input-group-btn">
				<button class="btn btn-lg btn-info" type="submit"><span class="glyphicon glyphicon-search"></span></button>
			</span>
		</div>
		{{Form::close()}}
	</div>
</div>