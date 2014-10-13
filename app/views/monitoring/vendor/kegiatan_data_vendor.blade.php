<div class="row">
	<div class="col-md-12">
		<div class="text-center"> 
			{{$kegiatans->appends(Input::all())->links()}}
		</div>
		<table class="table">
			<thead>
				<tr>
					<th>Kegiatan</th>
					<th>Tanggal</th>
					<th>Nilai</th>
					<th class="text-center" colspan="2">Pilihan</th>
				</tr>
			</thead>
			<tbody>
				@foreach($kegiatans as $kegiatan)
				<tr>
					<td>{{$kegiatan->kegiatan}}</td>
					<td>{{$kegiatan->tanggal}}</td>
					<td>{{round($kegiatan->nilai,2)}}</td>
					<td><a class="btn btn-warning circle" href="{{url('/vendor/data/'.$kegiatan->id_vendor.'/edit/'.$kegiatan->id)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
					<td><a class="btn btn-danger circle" href="{{url('/vendor/data/'.$kegiatan->id_vendor.'/delete/'.$kegiatan->id)}}"><span class="glyphicon glyphicon-trash"></span></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>