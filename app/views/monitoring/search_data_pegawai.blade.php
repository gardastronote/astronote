<div>
	@if(!count($pegawai)>0)
	<h1>Tidak ada pegawai</h1>
	@else
	<h1>Total {{count($pegawai)}}</h1>
	<table>
		<thead>
			<th>NIP</th>
			<th>Nama</th>
			<th>Grade</th>
			<th>Job</th>
			<th>Jenis</th>
			<th>Penempatan</th>
			<th>Title</th>
			<th>Unit</th>
			<th>Jenis Kelamin</th>
			<th>Detail</th>
			<th colspan="2">Opsi</th>
		</thead>
		@foreach($pegawai as $pegawai)
		<tr>
			<td>{{$pegawai->nip}}</td>
			<td>{{$pegawai->nama}}</td>
			<td>{{$pegawai->grade->grade}}</td>
			<td>{{$pegawai->job->job}}</td>
			<td>{{$pegawai->jenis->jenis}}</td>
			<td>{{$pegawai->penempatan->penempatan}}</td>
			<td>{{$pegawai->title->title}}</td>
			<td>{{$pegawai->unit->unit}}</td>
			<td>{{$pegawai->jkelamin}}</td>
			<td><a href="#">Detail</a></td>
			<td><a href="{{action('MonitoringController@edit_data_pegawai',$pegawai->id)}}">Ubah</a></td>
			<td><a href="{{action('MonitoringController@delete_data_pegawai',$pegawai->id)}}">Hapus</a></td>
		@endforeach
	</table>
	@endif
</div>