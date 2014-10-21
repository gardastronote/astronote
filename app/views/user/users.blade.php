@extends('layout.dashboard')
@section('content')
<div class="row" style="margin-top:-18px;">
	<ol class="breadcrumb">
		<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><i class="fa fa-users"></i> User</li>
	</ol>
</div>
<div class="row">
	<div class="col-md-9 paginate-default">
		{{$users->links()}}
	</div>
	<div class="col-md-3 text-right">
		<a data-content="Tambah Vendor" class="btn btn-success btn-flat loadContent" href="{{url('/user/add')}}"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="list-group">
			@foreach($users as $user)
				<div class="list-group-item">
					<h4><img class="avatar" src="{{asset('avatar/'.$user->avatar)}}"> {{$user->full_name}} <small>{{$user->username}}</small></h4>
					@if($user->username !== 'admin')
					<div class="dropdown btn-top-right">
						<a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-chevron-down"></span></a>
						<ul class="dropdown-menu pull-right">
							<li><a class="dropdown-update loadContent" href="{{url('/user/setting/'.$user->id)}}"><span class="glyphicon glyphicon-edit"></span> Ubah</a></li>
							<li><a class="dropdown-delete loadContent" href="{{url('/user/delete/'.$user->id)}}"><span class="glyphicon glyphicon-trash"></span> Hapus</a></li>
						</ul>
					</div>
					@endif
				</div>
			@endforeach
		</div>
	</div>
</div>
@stop