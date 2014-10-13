<div class="fixed-btn">
	<a class="btn btn-info btn-lg circle-fly loadContent" onclick="return false" href="{{url('/pengaturan_data_pelatihan')}}"><span class="glyphicon glyphicon-chevron-left"></span></a>
</div>
@if(count($pelatihans)>0)
<div class="fixed-btn btn-right">
	<a class="btn btn-success btn-lg circle-fly" href="{{url('/excel_pelatihan_data',$id)}}"><span class="glyphicon glyphicon-download-alt"></span></a>
</div>
@endif
<div class="row">
	<div class="col-md-12">
		@if(!count($pelatihans)>0)
		<h1 class="text-center">Belum ada yang mengikuti pelatihan ini</h1>
		@else
		<div class="col-md-10 col-md-offset-1 text-center">
			<h4>{{$pelatihan->pelatihan}}</h4>
			<h1><small>{{count($pelatihans)}} Orang mengikuti pelatihan ini</small></h1>
			{{$pelatihans->appends(Input::all())->links()}}
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Pelatihan</th>
					<th>Tanggal</th>
					<th colspan="2">Pilihan</th>
				</tr>
			</thead>
			<tbody>
				@foreach($pelatihans as $pelatihan)
				<tr>
					<td>{{$pelatihan->pegawai->nama}}</td>
					<td>{{$pelatihan->pelatihan->pelatihan}}</td>
					<td>{{$pelatihan->tanggal}}</td>
					<td><a class="btn btn-warning circle loadContent" onclick="return false" href="{{url('/edit_data_pelatihan',$pelatihan->id)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
				<td><a class="btn btn-danger circle loadContent" onclick="return false" href="{{url('/delete_data_pelatihan/'.$pelatihan->id_pegawai,$pelatihan->id)}}"><span class="glyphicon glyphicon-trash"></span></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{{$pelatihans->appends(Input::all())->links()}}
		</div>
		@endif
	</div>
</div>