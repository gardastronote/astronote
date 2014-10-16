<div class="row">
	<div class="col-md-12">
		<div class="text-center"> 
			{{$kegiatans->appends(Input::all())->links()}}
		</div>
		<table class="table">
			<thead>
				<tr>
					<th>Kegiatan</th>
					<th class="text-center"><span class="glyphicon glyphicon-calendar"></span></th>
					<th class="text-center"><span class="glyphicon glyphicon-thumbs-up"></span></th>
					<th class="text-center"><span class="glyphicon glyphicon-tasks"></span></th>
				</tr>
			</thead>
			<tbody>
				@foreach($kegiatans as $kegiatan)
				<tr>
					<td>{{$kegiatan->kegiatan}}</td>
					<td class="text-center">{{date('d M Y',strtotime($kegiatan->tanggal))}}</td>
					<td class="text-center">{{round($kegiatan->nilai,2)}}</td>
					<td class="dropdown text-center">
						<a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-chevron-down"></span></a>
						<ul class="dropdown-menu pull-right">
							<li><a class="dropdown-update loadContent" href="{{url('/vendor/data/'.$kegiatan->id_vendor.'/edit/'.$kegiatan->id)}}"><span class="glyphicon glyphicon-edit"></span> Ubah</a></li>
							<li><a class="dropdown-delete loadContent" href="{{url('/vendor/data/'.$kegiatan->id_vendor.'/delete/'.$kegiatan->id)}}"><span class="glyphicon glyphicon-trash"></span> Hapus</a></li>
						</ul>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>