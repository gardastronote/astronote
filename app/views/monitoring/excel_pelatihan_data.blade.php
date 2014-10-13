<?php
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=$pelatihan->pelatihan.xls");
?>
<table>
	<h1>{{$pelatihan->pelatihan}}</h1>
	<thead>
		<tr>
			<th>Nama</th>
			<th>Tanggal</th>
			<th>Lama (Hari)</th>
			<th>Tahun</th>
			<th>Nomor Surat Tugas</th>
			<th>Lulus/Tidak</th>
			<th>Score</th>
		</tr>
	</thead>
	<tbody>
		@foreach($pelatihans as $pelatihan)
		<tr>
			<td>{{$pelatihan->pegawai->nama}}</td>
			<td>{{$pelatihan->tanggal}}</td>
			<td>{{$pelatihan->lama}}</td>
			<td>{{$pelatihan->tahun}}</td>
			<td>{{$pelatihan->no_surat_penugasan}}</td>
			<td>{{$pelatihan->lulus}}</td>
			<td>{{$pelatihan->score}}</td>
		</tr>
		@endforeach
	</tbody>
</table>