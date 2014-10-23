<?php
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=$top.xls");
?>
<table class="table">
	<thead>
		<th><span class="glyphicon glyphicon-link"></span> Nama Vendor</th>
		<th>Kegiatan</th>
		<th class="text-center">Tanggal</th>
		<th class="text-center">Nilai</th>
	</thead>
	<tbody class="star-top">
	@foreach($datas as $data)
	<tr>
		<td>
			{{$data->vendor_data->nama}}
		</td>
		<td>
			{{$data->kegiatan}}
		</td>
		<td class="text-center">{{date('d M Y',strtotime($data->tanggal))}}</td>
		<td class="text-center">
			{{round($data->nilai,2)}}
		</td>
	</tr>
	@endforeach
	</tbody>
</table>