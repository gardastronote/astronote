@if(Session::has('alert.error') || Session::has('alert.success'))
<div class="alert-float text-center">
	<div class="alert @if(Session::has('alert.error')) alert-danger @else alert-success @endif">
		@if(Session::has('alert.error'))
		<strong><span class="glyphicon glyphicon-bullhorn"></span> {{Session::pull('alert.error')}}</strong>
		@else
		<strong><span class="glyphicon glyphicon-bullhorn"></span> {{Session::pull('alert.success')}}</strong>
		@endif
	</div>
</div>
@endif
<div class="fixed-btn btn-right">
	<a href="/add_data_pegawai" class="circle-fly btn btn-success btn-lg loadContent" onclick="return false;"><span class="glyphicon glyphicon-plus"></span></a>
</div>
<div class="row">
	<div class="col-md-12 text-center">
		{{Form::open(['class'=>'form-inline dataGet center-form','onsubmit'=>'return false','action'=>'MonitoringController@search_data_pegawai','method'=>'get'])}}
		<div class="form-group">
			{{Form::select('type',[
			'nama'=>'Nama',
			'nip'=>'NIP',
			'grade'=>'Grade',
			'job'=>'Job',
			],'',['class'=>'form-control input-lg'])}}
		</div>
		<div class="form-group">
			{{Form::text('q','',['class'=>'form-control input-lg'])}}
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-search"></span></button>
		</div>
		{{Form::close()}}
	</div>
</div>
<div class="row">
	<div class="col-md-12"> 
		@if(!count($pegawai)>0)
		<h1>Tidak ada pegawai</h1>
		@else
		<div class="text-center">
			{{$pegawai->appends(Input::all())->links()}}
		</div>
		<table class="table table-condensed table-bordered">
			<thead>
				<th class="text-center">NIP</th>
				<th class="text-center">Nama</th>
				<th class="text-center">Grade</th>
				<th class="text-center">Job</th>
				<th class="text-center">Detail</th>
				<th class="text-center" colspan="2">Opsi</th>
			</thead>
			@foreach($pegawai as $data)
			<tr>
				<td>{{$data->nip}}</td>
				<td>{{$data->nama}}</td>
				<td>{{$data->grade->grade}}</td>
				<td>{{$data->job->job}}</td>
				<td><a class="btn btn-info circle loadContent" onclick="return false" href="{{url('/data_pelatihan',$data->id)}}"><span class="glyphicon glyphicon-search"></span></a></td>
				<td><a class="btn btn-warning circle loadContent" onclick="return false" href="{{action('MonitoringController@edit_data_pegawai',$data->id)}}"><span class="glyphicon glyphicon-pencil"></span></a></a></td>
				<td><a class="btn btn-danger circle" href="{{action('MonitoringController@delete_data_pegawai',$data->id)}}"><span class="glyphicon glyphicon-trash"></span></a></a></td>
			@endforeach
		</table>
		<div class="text-center">
			{{$pegawai->appends(Input::all())->links()}}
		</div>
		@endif
	</div>
</div>