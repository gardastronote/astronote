<div class="row">
	<div class="col-md-6 pengaturan_data_pegawai">
		<div>
			<a class="btn btn-success circle loadContent" onclick="return false" href="{{url('/add_pengaturan_data_pegawai/Pegawai_grade/grade')}}"><span class="glyphicon glyphicon-plus"></span></a>
		</div>
		<div>
			@if(count($grades)>0)
			<table class="table table-bordered">
				<thead>
					<th>Grade</th>
					<th colspan="2">Opsi</th>
				</thead>
				@foreach($grades as $grade)
				<tr>
					<td>{{$grade->grade}}</td>
					<td>
						<a class="btn btn-warning circle loadContent" href="{{route('edit_pengaturan_data_pegawai','Pegawai_grade/grade/'.$grade->id)}}" onclick="return false"><span class="glyphicon glyphicon-pencil"></span></a>
					</td>
					<td>
						<a class="btn btn-danger circle loadContent" href="{{route('delete_pengaturan_data_pegawai','Pegawai_grade/'.$grade->id)}}"><span class="glyphicon glyphicon-trash"></span></a>
					</td>
				</tr>
				@endforeach
			</table>
			@else
			<h1>Tidak ada data</h1>
			@endif
		</div>
	</div>
	<div class="col-md-6 pengaturan_data_pegawai">
		<div>
			<a class="btn btn-success circle loadContent" onclick="return false" href="{{url('/add_pengaturan_data_pegawai/Pegawai_jenis/jenis')}}"><span class="glyphicon glyphicon-plus"></span></a>
		</div>
		<div>
			@if(count($jeniss)>0)
			<table class="table">
				<thead>
					<th>Jenis</th>
					<th colspan="2">Opsi</th>
				</thead>
				@foreach($jeniss as $jenis)
				<tr>
					<td>{{$jenis->jenis}}</td>
					<td>
						<a class="btn btn-warning circle" href="{{route('edit_pengaturan_data_pegawai','Pegawai_jenis/jenis/'.$jenis->id)}}" class="loadContent" onclick="return false"><span class="glyphicon glyphicon-pencil"></span></a>
					</td>
					<td>
						<a class="btn btn-danger circle" href="{{route('delete_pengaturan_data_pegawai','Pegawai_jenis/'.$jenis->id) }}"><span class="glyphicon glyphicon-trash"></span></a>
					</td>
				</tr>
				@endforeach
			</table>
			@else
			<h1>Tidak ada data</h1>
			@endif
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 pengaturan_data_pegawai">
		<div>
			<a class="btn btn-success circle loadContent" onclick="return false" href="{{url('/add_pengaturan_data_pegawai/Pegawai_job/job')}}"><span class="glyphicon glyphicon-plus"></span></a>
		</div>
		<div>
			@if(count($jobs)>0)
			<table class="table">
				<thead>
					<th>Grade</th>
					<th colspan="2">Opsi</th>
				</thead>
				@foreach($jobs as $job)
				<tr>
					<td>{{$job->job}}</td>
					<td>
						<a class="btn btn-warning circle" href="{{route('edit_pengaturan_data_pegawai','Pegawai_job/job/'.$job->id)}}" class="loadContent" onclick="return false"><span class="glyphicon glyphicon-pencil"></span></a>
					</td>
					<td>
						<a class="btn btn-danger circle" href="{{route('delete_pengaturan_data_pegawai','Pegawai_job/'.$job->id)}}"><span class="glyphicon glyphicon-trash"></span></a>
					</td>
				</tr>
				@endforeach
			</table>
			@else
			<h1>Tidak ada data</h1>
			@endif
		</div>
	</div>
	<div class="col-md-6 pengaturan_data_pegawai">
		<div>
			<a class="btn btn-success circle loadContent" onclick="return false" href="{{url('/add_pengaturan_data_pegawai/Pegawai_penempatan/penempatan')}}"><span class="glyphicon glyphicon-plus"></span></a>
		</div>
		<div>
			@if(count($penempatans)>0)
			<table class="table">
				<thead>
					<th>Grade</th>
					<th colspan="2">Opsi</th>
				</thead>
				@foreach($penempatans as $penempatan)
				<tr>
					<td>{{$penempatan->penempatan}}</td>
					<td>
						<a class="btn btn-warning circle" href="{{route('edit_pengaturan_data_pegawai','Pegawai_penempatan/penempatan/'.$penempatan->id)}}" class="loadContent" onclick="return false"><span class="glyphicon glyphicon-pencil"></span></a>
					</td>
					<td>
						<a class="btn btn-danger circle" href="{{route('delete_pengaturan_data_pegawai','Pegawai_penempatan/'.$penempatan->id)}}"><span class="glyphicon glyphicon-trash"></span></a>
					</td>
				</tr>
				@endforeach
			</table>
			@else
			<h1>Tidak ada data</h1>
			@endif
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 pengaturan_data_pegawai">
		<div>
			<a class="btn btn-success circle loadContent" onclick="return false" href="{{url('/add_pengaturan_data_pegawai/Pegawai_title/title')}}"><span class="glyphicon glyphicon-plus"></span></a>
		</div>
		<div>
			@if(count($titles)>0)
			<table class="table">
			<thead>
				<th>Title</th>
				<th colspan="2">Opsi</th>
			</thead>
			@foreach($titles as $title)
			<tr>
				<td>{{$title->title}}</td>
				<td>
					<a class="btn btn-warning circle" href="{{route('edit_pengaturan_data_pegawai','Pegawai_title/title/'.$title->id)}}" class="loadContent" onclick="return false"><span class="glyphicon glyphicon-pencil"></span></a>
				</td>
				<td>
					<a class="btn btn-danger circle" href="{{route('delete_pengaturan_data_pegawai','Pegawai_title/'.$title->id)}}"><span class="glyphicon glyphicon-trash"></span></a>
				</td>
			</tr>
			@endforeach
			</table>
			@else
			<h1>Tidak ada data</h1>
			@endif
		</div>
	</div>
	<div class="col-md-6 pengaturan_data_pegawai">
		<div>
			<a class="btn btn-success circle loadContent" onclick="return false" href="{{url('/add_pengaturan_data_pegawai/Pegawai_unit/unit')}}"><span class="glyphicon glyphicon-plus"></span></a>
		</div>
		<div>
			@if(count($units)>0)
			<table class="table">
				<thead>
					<th>Unit</th>
					<th colspan="2">Opsi</th>
				</thead>
				@foreach($units as $unit)
				<tr>
					<td>{{$unit->unit}}</td>
					<td>
						<a class="btn btn-warning circle" href="{{route('edit_pengaturan_data_pegawai','Pegawai_unit/unit/'.$unit->id)}}" class="loadContent" onclick="return false"><span class="glyphicon glyphicon-pencil"></span></a>
					</td>
					<td>
						<a class="btn btn-danger circle loadContent" href="{{route('delete_pengaturan_data_pegawai','Pegawai_unit/'.$unit->id)}}"><span class="glyphicon glyphicon-trash"></span></a>
					</td>
				</tr>
				@endforeach
			</table>
			@else
			<h1>Tidak ada data</h1>
			@endif
		</div>
	</div>
</div>