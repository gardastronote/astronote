<?php
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=$pegawai->nama.xls");
?>
<table>
	<h1>{{$pegawai->nama}}</h1>
	<h3>{{$pegawai->nip}}</h3>
	<thead>
		<tr>
			<th>Pelatihan</th>
			<th>Tanggal</th>
			<th>Lama (Hari)</th>
			<th>Tahun</th>
			<th>Tempat</th>
			<th>Lulus/Tidak</th>
			<th>Score</th>
		</tr>
	</thead>
	<tbody>
		@foreach($pelatihans as $pelatihan)
		<tr>
			<td>{{$pelatihan->pelatihan->pelatihan}}</td>
			<td>{{$pelatihan->tanggal}}</td>
			<td>{{$pelatihan->lama}}</td>
			<td>{{$pelatihan->tahun}}</td>
			<td>{{$pelatihan->lulus}}</td>
			<td>{{$pelatihan->score}}</td>
		</tr>
		@endforeach
	</tbody>
</table>