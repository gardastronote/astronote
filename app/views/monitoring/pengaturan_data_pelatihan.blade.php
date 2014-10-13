<div class="fixed-btn btn-right">
	<a href="/add_pengaturan_data_pelatihan" class="circle-fly btn btn-success btn-lg loadContent" onclick="return false;"><span class="glyphicon glyphicon-plus"></span></a>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="text-center">
			{{Form::open(['url'=>'/search_pengaturan_data_pelatihan','class'=>'form-inline dataGet center-form','method'=>'get','onsubmit'=>'return false'])}}
			<div class="form-group @if($errors->has('pelatihan')) has-error @endif">
				{{Form::text('p','',['class'=>'input-lg form-control'])}}
			</div>
			<div class="form-group">
				<button class="btn btn-lg btn-info"><span class="glyphicon glyphicon-search"></span></button>
			</div>
			{{Form::close()}}
		</div>
		<div>
			@if(!count($pelatihans)>0)
			<h1 class="text-center">Tidak ada pelatihan</h1>
			@else
			<div class="text-center">
				{{$pelatihans->links()}}
			</div>
			<table class="table table-condensed ">
				<thead>
					<th class="text-center">Pelatihan</th>
					<th class="text-center" colspan="3">Pilihan</th>
				</thead>
			@foreach($pelatihans as $pelatihan)
				<tr>
					<td>{{$pelatihan->pelatihan}}</td>
					<td><a class="btn btn-info circle loadContent" onclick="return false" href="{{url('/pelatihan',$pelatihan->id)}}"><span class="glyphicon glyphicon-search"></span></a></td>
					<td><a class="btn btn-warning circle loadContent" onclick="return false" href="{{url('/edit_pengaturan_data_pelatihan',$pelatihan->id)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
					<td><a class="btn btn-danger circle loadContent" onclick="return false" href="{{url('/delete_pengaturan_data_pelatihan/Pelatihan_pelatihan',$pelatihan->id)}}"><span class="glyphicon glyphicon-trash"></span></a></td>
				</tr>
			@endforeach
			</table>
			<div class="text-center">
				{{$pelatihans->links()}}
			</div>
			@endif
		</div>
	</div>
</div>