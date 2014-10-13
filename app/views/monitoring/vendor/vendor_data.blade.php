<div class="row">
	<div class="col-md-12">
		@if(!count($vendors)>0)
		<h1 class="text-center">Tidak ada vendor</h1>
		@else
		<table class="table">
			<thead>
				<tr>
					<th>Jenis</th>
					<th>Nama</th>
					<th class="text-center">Total Rata-rata</th>
					<th class="text-center" colspan="3">Pilihan</th>
				</tr>
			</thead>
			<tbody>
				@foreach($vendors as $vendor)
					@if($vendor->jenis == 'pelatihan')
						<?php $jenis = 'success'; ?>
					@elseif($vendor->jenis == 'catering')
						<?php $jenis = 'danger'; ?>
					@else
						<?php $jenis = 'warning'; ?>
					@endif
				<tr class="{{$jenis}}">
					<td>{{ucfirst($vendor->jenis)}}</td>
					<td>{{$vendor->nama}}</td>
					<td class="text-center">{{round(Vendor_kegiatan::where('id_vendor','=',$vendor->id)->avg('nilai'),2)}}</td>
					<td><a class="btn btn-info circle" href="{{url('/vendor/data/'.$vendor->id)}}"><span class="glyphicon glyphicon-search"></span></a></td>
					<td><a class="btn btn-warning circle" href="{{url('/vendor/edit/'.$vendor->id)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
					<td><a class="btn btn-danger circle" href="{{url('/vendor/delete/'.$vendor->id)}}"><span class="glyphicon glyphicon-trash"></span></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@endif
	</div>
</div>