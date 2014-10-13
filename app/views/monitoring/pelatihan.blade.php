<div class="fixed-btn">
	<a class="btn btn-info btn-lg circle-fly loadContent" onclick="return false" href="{{url('/pengaturan_data_pelatihan')}}"><span class="glyphicon glyphicon-chevron-left"></span></a>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="text-center">
			{{Form::open(['url'=>'/search_pelatihan','class'=>'form-inline dataGet center-form','method'=>'get','onsubmit'=>'return false'])}}
			<div class="form-group @if($errors->has('pelatihan')) has-error @endif">
				{{Form::text('p','',['class'=>'input-lg form-control'])}}
			</div>
			<div class="form-group">
				<button class="btn btn-lg btn-info"><span class="glyphicon glyphicon-search"></span></button>
			</div>
			{{Form::close()}}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		@if(!count($pelatihans)>0)
		<h1 class="text-center">Belum ada yang mengikuti pelatihan ini</h1>
		@else
		<div class="text-center">
			{{$pelatihans->appends(Input::all())->links()}}
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Pelatihan</th>
					<th>Tanggal</th>
				</tr>
			</thead>
			<tbody>
				@foreach($pelatihans as $pelatihan)
				<tr>
					<td>{{$pelatihan->pegawai->nama}}</td>
					<td>{{$pelatihan->pelatihan->pelatihan}}</td>
					<td>{{$pelatihan->tanggal}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{{$pelatihans->appends(Input::all())->links()}}
		</div>
		@endif
	</div>
</div>