<div class="row">
	<div class="text-center col-md-12">
		<h1><small>Total Rata-Rata {{ucfirst($vendor->jenis)}} : {{round($average,2)}}</small></h1>
		<canvas height="150" width="760" id="bar"></canvas>
		<style type="text/css">
		body{
			overflow-x:hidden;
		}
		</style>
	</div>
</div>
<script type="text/javascript" src="{{asset('js/Chart.js')}}"></script>
<script type="text/javascript">
var chartData = {
	<?php $kegiatans = $kegiatans->reverse() ?>
	labels : [
		@foreach($kegiatans as $kegiatan)
		@if(strlen($kegiatan->kegiatan) > 10)
		<?php $kegiatan = substr_replace($kegiatan->kegiatan,'...', 10); ?>
		@else
		<?php $kegiatan = $kegiatan->kegiatan; ?>
		@endif
		{{'"'.$kegiatan.'"'}},
		@endforeach
	],
	datasets : [
	{
		@if($vendor->jenis == 'hotel')
		<?php
			$fill = "rgba(255,128,0,.7)";
			$hFill = "rgba(255,128,0,1)";
		?>
		@elseif($vendor->jenis == 'catering')
		<?php
			$fill = "rgba(255,0,0,.7)";
			$hFill = "rgba(255,0,0,1)";
		?>
		@else
		<?php
			$fill = "rgba(0,255,0,.7)";
			$hFill = "rgba(0,255,0,1)";
		?>
		@endif
		fillColor :"{{ $fill}}",
		highlightFill : "{{ $hFill }}",
		data : [@foreach($kegiatans as $kegiatan){{round($kegiatan->nilai,2)}},@endforeach]
	}
	] 
}
	function loadChart(){
	var ctx = document.getElementById('bar').getContext('2d');
	window.myBar = new Chart(ctx).Bar(chartData,{
		responsive: true
	});
}
</script>