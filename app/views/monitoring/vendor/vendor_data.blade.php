<div class="row">
	<div class="col-md-12 text-center">
		{{$vendors->appends(Input::all())->links()}}
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		@if(!count($vendors)>0)
		<h1 class="text-center">Tidak ada vendor</h1>
		@else
		<table class="table">
			<thead>
				<tr>
					<th><i class="fa fa-link"></i> Jenis Vendor</th>
					<th>Nama</th>
					<th class="text-center"><span class="glyphicon glyphicon-list"></th>
					<th class="text-center"><span class="glyphicon glyphicon-thumbs-up"></th>
					<th class="text-center"><span class="glyphicon glyphicon-search"></span></th>
					<th class="text-center"><span class="glyphicon glyphicon-tasks"></span></th>
				</tr>
			</thead>
			<tbody>
				@foreach($vendors as $vendor)
					@if($vendor->jenis == 'pelatihan')
						<?php $jenis = 'success'; ?>
						<?php $glyph = '<i class="fa fa-book"></i>'; ?>
					@elseif($vendor->jenis == 'catering')
						<?php $jenis = 'danger'; ?>
						<?php $glyph = '<i class="glyphicon glyphicon-cutlery"></i>'; ?>
					@else
						<?php $jenis = 'warning'; ?>
						<?php $glyph = '<i class="fa fa-building"></i>'; ?>
					@endif
				<tr class="{{$jenis}}">
					<td>{{$glyph}} {{ucfirst($vendor->jenis)}}</td>
					<td>{{$vendor->nama}}</td>
					<td class="text-center">{{Vendor_kegiatan::where('id_vendor','=',$vendor->id)->count()}} Kegiatan</td>
					<td class="text-center">{{round(Vendor_kegiatan::where('id_vendor','=',$vendor->id)->avg('nilai'),2)}}</td>
					<td class="text-center"><a class="loadContent" href="{{url('/vendor/data/'.$vendor->id)}}"><span class="glyphicon glyphicon-search"></span></a></td>
					<td class="dropdown text-center">
						<a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-chevron-down"></span></a>
						<ul class="dropdown-menu pull-right">
							<li><a class="dropdown-update loadContent" href="{{url('/vendor/edit/'.$vendor->id)}}"><span class="glyphicon glyphicon-edit"></span> Ubah</a></li>
							<li><a class="dropdown-delete loadDelete" href="{{url('/vendor/delete/'.$vendor->id)}}"><span class="glyphicon glyphicon-trash"></span> Hapus</a></li>
						</ul>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@endif
	</div>
</div>