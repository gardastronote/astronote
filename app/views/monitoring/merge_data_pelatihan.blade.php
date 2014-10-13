<div class="fixed-btn">
	<a class="btn btn-primary btn-lg circle-fly loadContent" onclick="return false" href="{{url('/data_pelatihan',isset($id_pegawai)?$id_pegawai:$data->id_pegawai)}}"><span class="glyphicon glyphicon-user"></span></a>
</div>
@if(isset($data))
<div class="fixed-btn btn-left-1">
	<a class="btn btn-info btn-lg circle-fly loadContent" onclick="return false" href="{{url('/pelatihan',$data->id_pelatihan)}}"><span class="glyphicon glyphicon-list-alt"></span></a>
</div>
@endif
<div class="row">
	<div class="col-md-12"> 
		{{Form::open(['url'=>$url,'class'=>'form-horizontal dataSubmit','onsubmit'=>'return false'])}}
		<div class="form-group @if($errors->has('id_pelatihan')) has-error @endif">
			{{Form::label('id_pelatihan','Nama Pelatihan',['class'=>'control-label col-sm-4'])}}
			<div class="col-sm-4"> 
				{{Form::select('id_pelatihan',$pelatihans,isset($data->id_pelatihan)?$data->id_pelatihan:'',['class'=>'form-control'])}}
			</div>
			<div class="col-sm-4"> 
				@if($errors->has('id_pelatihan'))<p class="help-block">{{$errors->first('id_pelatihan')}}</p>@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('tanggal')) has-error @endif">
			{{Form::label('tanggal','Tanggal',['class'=>'control-label col-sm-4'])}}
			<div class="col-sm-4"> 
				{{Form::text('tanggal',isset($data->tanggal)?$data->tanggal:'',['class'=>'datepicker form-control'])}}
			</div>
			<div class="col-sm-4"> 
				@if($errors->has('tanggal'))<p class="help-block">{{$errors->first('tanggal')}}</p>@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('lama')) has-error @endif">
			{{Form::label('lama','Lama (Hari)',['class'=>'control-label col-sm-4'])}}
			<div class="col-sm-4"> 
				{{Form::text('lama',isset($data->lama)?$data->lama:'',['class'=>'form-control'])}}
			</div>
			<div class="col-sm-4"> 
				@if($errors->has('lama'))<p class="help-block">{{$errors->first('lama')}}</p>@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('tahun')) has-error @endif">
			{{Form::label('tahun','Tahun',['class'=>'control-label col-sm-4'])}}
			<div class="col-sm-4"> 
				{{Form::text('tahun',isset($data->tahun)?$data->tahun:'',['class'=>'form-control'])}}
			</div>
			<div class="col-sm-4"> 
				@if($errors->has('tahun'))<p class="help-block">{{$errors->first('tahun')}}</p>@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('tempat')) has-error @endif">
			{{Form::label('tempat','Tempat',['class'=>'control-label col-sm-4'])}}
			<div class="col-sm-4"> 
				{{Form::text('tempat',isset($data->tempat)?$data->tempat:'',['class'=>'form-control'])}}
			</div>
			<div class="col-sm-4"> 
				@if($errors->has('tempat'))<p class="help-block">{{$errors->first('tempat')}}</p>@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('no_surat_tugas')) has-error @endif">
			{{Form::label('no_surat_penugasan','Nomor Surat Tugas',['class'=>'control-label col-sm-4'])}}
			<div class="col-sm-4"> 
				{{Form::text('no_surat_penugasan',isset($data->no_surat_penugasan)?$data->no_surat_penugasan:'',['class'=>'form-control'])}}
			</div>
			<div class="col-sm-4"> 
				@if($errors->has('no_surat_penugasan'))<p class="help-block">{{$errors->first('no_surat_penugasan')}}</p>@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('lulus')) has-error @endif">
			{{Form::label('lulus','Lulus/Tidak',['class'=>'control-label col-sm-4'])}}
			<div class="col-sm-4"> 
				{{Form::text('lulus',isset($data->lulus)?$data->lulus:'',['class'=>'form-control'])}}
			</div>
			<div class="col-sm-4"> 
				@if($errors->has('lulus'))<p class="help-block">{{$errors->first('lulus')}}</p>@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('score')) has-error @endif">
			{{Form::label('score','Score',['class'=>'control-label col-sm-4'])}}
			<div class="col-sm-4"> 
				{{Form::text('score',isset($data->score)?$data->score:'',['class'=>'form-control'])}}
			</div>
			<div class="col-sm-4"> 
				@if($errors->has('score'))<p class="help-block">{{$errors->first('score')}}</p>@endif
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-4 col-sm-offset-4"> 
				@if(isset($data->id))
				{{Form::hidden('id',$data->id)}}
				@endif
				{{Form::hidden('id_pegawai',isset($id_pegawai)?$id_pegawai:$data->id_pegawai)}}
				{{Form::submit($button,['class'=>'btn btn-success'])}}
			</div>
		</div>
		{{Form::close()}}
	</div>
</div>
	<script type="text/javascript" src="{{asset('bootstrap/datepicker/bootstrap-datepicker.js')}}"></script>
	<script type="text/javascript">
	$(document).ready(function(){
	$('.datepicker').datepicker({
			format:'yyyy-mm-dd',
			autoclose:true,
			todayHighlight:true,
		});
	});
	</script>