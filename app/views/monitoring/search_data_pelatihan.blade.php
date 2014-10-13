<div>
	<div>
		@if(!count($pelatihans)>0)
		<h1>Tidak ada data pelatihan</h1>
		@else
		<table>
			<thead>
				<th>Pelatihan</th>
				<th>Tanggal</th>
				<th>Lama</th>
				<th>Tahun</th>
				<th>Tempat</th>
				<th>Surat Tugas</th>
				<th>Lulus/Tidak</th>
				<th>Score</th>
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
			</tr>
			@endforeach
		</table>
		@endif
	</div>
	<div>
		{{Form::open(['url'=>'/search_data_pelatihan','method'=>'GET'])}}
		<div class="form-group">
			{{Form::text('pelatihan')}}
		</div>
		<div class="form-group">
			{{Form::hidden('p',Input::get('p'))}}
			{{Form::submit('cari')}}
		</div>
		{{Form::close()}}
	</div>
</div>