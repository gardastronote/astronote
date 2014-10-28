<?php
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
$bulan = Input::get('bulan');
$tahun = Input::get('tahun');
$file = 'Pelatihan bulan '.$bulan.' tahun '.$tahun;
header("Content-Disposition: attachment; filename=$file.xls");
?>
<table>
	<thead>
		<th>NIP</th>
		<th>Nama</th>
		<th>Grade</th>
		<th>Unit</th>
		<th>Pelatihan</th>
		<th>Tanggal</th>
	</thead>
	<tbody>
		@foreach($pelatihans as $pelatihan)
		<tr>
			<td>{{$pelatihan->pegawai->nip}}</td>
			<td>{{$pelatihan->pegawai->nama}}</td>
			<td>{{$pelatihan->pegawai->grade->grade}}</td>
			<td>{{$pelatihan->pegawai->unit->unit}}</td>
			<td>{{$pelatihan->pelatihan->pelatihan}}</td>
			<td>{{$pelatihan->tanggal}}</td>
		</tr>
		@endforeach
	</tbody>
</table>