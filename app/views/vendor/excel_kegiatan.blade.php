<?php
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=$vendor->nama.xls");
?>
<table class="table table-striped">
	<h1>{{$vendor->nama}}</h1>
	<thead>
		<tr>
			<th>Kegiatan</th>
			<th>Tanggal</th>
			<th>Tempat</th>
			<th>Nilai</th>
		</tr>
	</thead>
	<tbody>
		@foreach($kegiatans as $kegiatan)
		<tr>
			<td>{{$kegiatan->kegiatan}}</td>
			<td>{{$kegiatan->tanggal}}</td>
			<td>{{$kegiatan->tempat}}</td>
			<td>{{round($kegiatan->nilai,2)}}</td>
		</tr>
		@endforeach
	</tbody>
</table>