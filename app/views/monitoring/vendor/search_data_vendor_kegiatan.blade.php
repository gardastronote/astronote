<div class="row">
	<div class="col-md-12 text-center">
		{{Form::open(['url'=>"/vendor/data/$id/search",'method'=>'GET','class'=>'form-inline dataGet'])}}
		<div class="form-group">
			{{Form::text('kegiatan',Input::get('kegiatan'),['class'=>'form-control input-lg'])}}
		</div>
		<div class="form-group">
			<button class="btn btn-lg btn-info" type="submit"><span class="glyphicon glyphicon-search"></span></button>
		</div>
		{{Form::close()}}
	</div>
</div>