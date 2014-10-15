@extends('layout.dashboard')
@section('content')
@include('notif')
<div class="row">
	<div class="col-md-8 paginate-default">
		{{$datas->links()}}
	</div>
	<div class="col-md-4 text-right">
		<a class="loadContent btn btn-success" onclick="return false" href="{{url("/add_pengaturan_data_pegawai/$model/$type")}}">
			<span class="glyphicon glyphicon-plus"></span> <b>Tambah data {{ucfirst($type)}}</b>
		</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="list-group">
		@if(count($datas)>0)
			@foreach($datas as $data)
			<div class="list-group-item">
				{{$data->$type}}
				<a class="pull-right" href="#" data-toggle="dropdown"> 
					<span class="glyphicon glyphicon-cog"></span>
				</a>
				<ul class="pull-right dropdown-menu">
					<li><a class="dropdown-update loadContent" href="{{route('edit_pengaturan_data_pegawai',"Pegawai_$type/$type/".$data->id)}}" onclick="return false"><span class="glyphicon glyphicon-pencil"></span> Ubah</a></li>
					<li><a class="dropdown-delete loadContent" href="{{route('delete_pengaturan_data_pegawai',"Pegawai_$type/".$data->id)}}"><span class="glyphicon glyphicon-trash"></span> Hapus</a></li>
				</ul>
			</div>
			@endforeach
		@else
		<h1>Tidak ada data</h1>
		@endif
		</div>
	</div>
</div>
@stop