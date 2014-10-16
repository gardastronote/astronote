@extends('layout.dashboard')
@section('content')
@if(count($pelatihans)>0)
<div class="fixed-btn btn-right">
	<a class="btn btn-success btn-lg btn-flat" href="{{url('/excel_pelatihan_data',$id)}}"><span class="glyphicon glyphicon-download-alt"></span></a>
</div>
@endif
<div class="row">
	<div class="col-md-12">
		@if(!count($pelatihans)>0)
		<h1 class="text-center">Belum ada yang mengikuti pelatihan ini</h1>
		@else
		<div class="col-md-10 col-md-offset-1 text-center">
			<h4>{{$pelatihan->pelatihan}}</h4>
			<h1><small>{{$count}} Orang mengikuti pelatihan ini</small></h1>
			{{$pelatihans->appends(Input::all())->links()}}
		</div>
		<table class="table table-condensed table-striped">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Pelatihan</th>
					<th class="text-center"><span class="glyphicon glyphicon-calendar"></span></th>
					<th><span class="glyphicon glyphicon-tasks"></span></th>
				</tr>
			</thead>
			<tbody>
				@foreach($pelatihans as $pelatihan)
				<tr>
					<td>{{$pelatihan->pegawai->nama}}</td>
					<td>{{$pelatihan->pelatihan->pelatihan}}</td>
					<td class="text-center">{{$pelatihan->tanggal}}</td>
					<td class="dropdown">
						<a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-chevron-down"></span></a>
						<ul class="dropdown-menu pull-right">
							<li><a class="dropdown-delete loadContent" href="{{url('/edit_data_pelatihan',$pelatihan->id)}}"><span class="glyphicon glyphicon-edit"></span> Ubah</a></li>
							<li><a class="dropdown-delete loadContent" href="{{url('/delete_data_pelatihan/'.$pelatihan->id_pegawai,$pelatihan->id)}}"><span class="glyphicon glyphicon-trash"></span> Hapus</a></li>
						</ul>
					</td>
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
@stop