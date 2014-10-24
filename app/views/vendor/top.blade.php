@extends('layout.dashboard')
@section('content')
@if(count($datas)>0)
<div style="margin-top:50px" class="fixed-btn btn-right">
	<a class="btn btn-primary" href="{{url('/vendor/top/excel?jenis='.Input::get('jenis').'&&bulan='.Input::get('bulan').'&&tahun='.Input::get('tahun'))}}"><span class="glyphicon glyphicon-download-alt"></span></a>
</div>
@endif
<div class="row margin-top-breadcrumb">
	<ol class="breadcrumb">
		<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><i class="fa fa-star"></i> Top {{ ucfirst(Input::get('jenis')) }} Vendors</li>
	</ol>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="text-center">
			{{Form::open(['url'=>'vendor/top','method'=>'get','class'=>'form-inline dataGet'])}}
			<div class="form-group">
				{{Form::text('bulan','',['class'=>'form-control input-lg datepickerMonth','placeholder'=>'Bulan'])}}
			</div>
			<div class="form-group input-group">
				{{Form::text('tahun',date('Y'),['class'=>'form-control input-lg datepickerYear','placeholder'=>'Tahun'])}}
				<div class="input-group-btn">
					{{Form::hidden('jenis',Input::get('jenis'))}}
					<button class="btn btn-info btn-lg"><span class="glyphicon glyphicon-search"></span></button>
				</div>
			</div>
			{{Form::close()}}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<h3 class="text-center"><i class="{{$glyph}}"></i> {{$top}}</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		@if(!count($datas) > 0)
		<h2 class="text-center">Belum ada kegiatan Vendor Bulan ini</h2>
		@else
		@if(Input::get('jenis') == 'pelatihan')
		<?php $color = 'green' ?>
		@elseif(Input::get('jenis') == 'catering')
		<?php $color = 'red' ?>
		@else
		<?php $color = 'orange' ?>
		@endif
		<style type="text/css">
		.fa-star,.fa-star-o{
			color:{{$color}};
		}
		</style>
		<table class="table">
			<thead>
				<th><span class="glyphicon glyphicon-link"></span> Nama Vendor</th>
				<th>Kegiatan</th>
				<th class="text-center"><span class="glyphicon glyphicon-calendar"></span></th>
				<th class="text-center"><span class="glyphicon glyphicon-thumbs-up"></span></th>
				<th class="text-center"><i class="fa fa-star-o"></i></th>
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
				<td class="nilai text-center"></td>
			</tr>
			@endforeach
			</tbody>
		</table>
		@endif
	</div>
</div>

<script type="text/javascript" src="{{asset('bootstrap/datepicker/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".star-top tr:nth-child(1) .nilai").append(
			"<i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i>"
			);
		$(".star-top tr:nth-child(2) .nilai").append(
			"<i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i>"
			);
		$(".star-top tr:nth-child(3) .nilai").append(
			"<i class=\"fa fa-star\"></i>"
			);
		$(".star-top tr:nth-child(4) .nilai").append(
			"<i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i>"
			);
		$(".star-top tr:nth-child(5) .nilai").append(
			"<i class=\"fa fa-star-o\"></i><i class=\"fa fa-star-o\"></i>"
			);
		$(".star-top tr:nth-child(6) .nilai").append(
			"<i class=\"fa fa-star-o\"></i>"
			);
		$('.datepickerMonth').datepicker({
			autoclose:true,
			minViewMode: "months",
			format:"mm",
			orientation: "top right",
			});
		$('.datepickerYear').datepicker({
			autoclose:true,
			minViewMode: "years",
			format:"yyyy",
			orientation: "top right",
			});
	});
</script>
@stop