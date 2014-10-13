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
<div class="fixed-btn">
	<a class="btn btn-info btn-lg circle-fly loadContent" onclick="return false" href="{{url('/data_pegawai')}}"><span class="glyphicon glyphicon-chevron-left"></span></a>
</div>
@if(count($pelatihans)>0)
<div class="fixed-btn btn-download">
	<a class="btn btn-success btn-lg circle-fly" href="{{url('/excel_data_pelatihan',$id_pegawai)}}"><span class="glyphicon glyphicon-download-alt"></span></a>
</div>
@endif
<div class="fixed-btn btn-right">
	<a class="btn btn-success btn-lg circle-fly loadContent" onclick="return false" href="{{url('/add_data_pelatihan',$id_pegawai)}}"><span class="glyphicon glyphicon-plus"></span></a>
</div>
<div class="row">
	<div class="col-md-12 center-form text-center">
		{{Form::open(['url'=>'/search_data_pelatihan','method'=>'GET','class'=>'form-inline dataGet','onsubmit'=>'return false'])}}
		<div class="form-group">
			{{Form::text('pelatihan','',['class'=>'form-control input-lg'])}}
		</div>
		<div class="form-group">
			{{Form::hidden('p',$id_pegawai)}}
			<button type="submit" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-search"></span></button>
		</div>
		{{Form::close()}}
	</div>
</div>
<div class="row">
	<div class="col-md-12 text-center">
		<h1>{{$pegawai->nama}}</h1>
		<h1><small>{{$pegawai->nip}}</small>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		@if(!count($pelatihans)>0)
		<h1 class="text-center">Tidak ada data pelatihan</h1>
		@else
		<div class="text-center">
			{{$pelatihans->appends(Input::all())->links()}}
		</div>
		<table class="table table-bordered table-condensed">
			<thead  class="text-center">
				<th>Pelatihan</th>
				<th>Tanggal</th>
				<th>Lama (Hari)</th>
				<th>Tahun</th>
				<th>Tempat</th>
				<th>Surat Tugas</th>
				<th>Lulus/Tidak</th>
				<th>Score</th>
				<th colspan="2">Opsi</th>
			</thead>
			@foreach($pelatihans as $pelatihan)
			<tr>
				<td>{{$pelatihan->pelatihan->pelatihan}}</td>
				<td>{{$pelatihan->tanggal}}</td>
				<td>{{$pelatihan->lama}}</td>
				<td>{{$pelatihan->tahun}}</td>
				<td>{{$pelatihan->tempat}}</td>
				<td>{{$pelatihan->no_surat_tugas}}</td>
				<td>{{$pelatihan->lulus}}</td>
				<td>{{$pelatihan->score}}</td>
				<td><a class="btn btn-warning circle loadContent" onclick="return false" href="{{url('/edit_data_pelatihan',$pelatihan->id)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
				<td><a class="btn btn-danger circle loadContent" onclick="return false" href="{{url('/delete_data_pelatihan/'.$pelatihan->id_pegawai,$pelatihan->id)}}"><span class="glyphicon glyphicon-trash"></span></td>
			</tr>
			@endforeach
		</table>
		<div class="text-center">
			{{$pelatihans->links()}}
		</div>
		@endif
	</div>
</div>
