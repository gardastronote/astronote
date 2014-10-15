<div class="row">
	<div class="col-md-12 text-center">
		<h1>{{$title}}</h1>
		<h1><small>Rata-Rata Keseluruhan : {{round($average,2)}} </small></h1>
		<canvas height="120" width="760" id="lineChart"></canvas>
	</div>
</div>
<script type="text/javascript" src="{{asset('js/Chart.js')}}"></script>
<script type="text/javascript">
	//line chart
	var lineData = {
		labels : [
		@if(count($dates) == 1) 0, @endif
		@foreach ($dates as $date) {{'"'.$date->bulan.'"'}}, @endforeach
		],
		datasets : [{
					strokeColor: {{'"'.$strokeColor.'"'}},
					pointColor: "rgba(0,0,0,1)",
					data : [
					@if(count($dates) == 1) 0, @endif
					@foreach ($dates as $date) {{round($date->average,2)}}, @endforeach
					]
				}]
	}
	function loadChart(){
		var ctx = document.getElementById("lineChart").getContext('2d');
		window.myLine = new Chart(ctx).Line(lineData,{
			bezierCurve : false,
			datasetFill : false,
		});
	}

</script>