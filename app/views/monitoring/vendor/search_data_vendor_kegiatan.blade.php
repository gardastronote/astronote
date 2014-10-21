<div class="row">
	<div class="col-md-12 text-center">
		{{Form::open(['url'=>"/vendor/data/$id/search",'method'=>'GET','class'=>'form-inline dataGet'])}}
		<div class="form-group input-group">
			{{Form::text('kegiatan',Input::get('kegiatan'),['class'=>'form-control input-lg'])}}
			<div class="input-group-btn">
				<button class="btn btn-lg btn-info" type="submit"><span class="glyphicon glyphicon-search"></span></button>
			</div>
		</div>
		{{Form::close()}}
	</div>
</div>