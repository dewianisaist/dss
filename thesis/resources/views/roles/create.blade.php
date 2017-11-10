@extends('layouts.master_admin')

@section('sidebar_menu')
<li><a href="{{ route('users.index') }}"><i class="fa fa-users"></i> <span>Data Pengguna</span></a></li>
<li class="active"><a href="{{ route('roles.index') }}"><i class="fa fa-key"></i>  <span>Data <dfn>Roles</dfn></span></a></li>
<li class="treeview">
  <a href="{{ route('vocationals.index') }}">
    <i class="fa fa-industry"></i>
    <span>Program</span>
  	<span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{ route('vocationals.index') }}"><i class="fa fa-industry"></i> Kejuruan</a></li>
    <li><a href="{{ route('subvocationals.index') }}"><i class="fa fa-industry"></i> Sub-Kejuruan</a></li>
  </ul>
</li>
<li><a href="{{ route('educations.index') }}"><i class="fa fa-graduation-cap"></i>  <span>Pendidikan</span></a></li>
<li><a href="{{ route('courses.index') }}"><i class="fa fa-university"></i>  <span>Kursus</span></a></li>
<li class="treeview">
  <a href="{{ route('preferences.index') }}">
    <i class="fa fa-hourglass-half"></i>
    <span>Penilaian</span>
  	<span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{ route('preferences.index') }}"><i class="fa fa-hourglass-half"></i>  <span>Preferensi</span></a></li>
    {{--  <li><a href="{{ route('preferences.index') }}"><i class="fa fa-hourglass-half"></i>  <span>Hasil</a></li>  --}}
  </ul>
</li>
@endsection
 
@section('content_header')
<h1>
  Buat <dfn>Role</dfn> Baru
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('roles.index') }}"><i class="fa fa-key"></i> Manajemen <dfn>Role</dfn></a></li>
  <li class="active">Buat <dfn>Role</dfn> Baru</li>
</ol>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-body">
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Maaf!</strong> Ada kesalahan dengan data yang Anda masukkan.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nama:</strong>
						{!! Form::text('name', null, array('placeholder' => 'Nama','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nama yang Ditampilkan:</strong>
						{!! Form::text('display_name', null, array('placeholder' => 'Nama yang ditampilkan','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Deskripsi:</strong>
						{!! Form::textarea('description', null, array('placeholder' => 'Deskripsi','class' => 'form-control','style'=>'height:100px')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong><dfn>Permission</dfn>:</strong>
						<br/>
						@foreach($permission as $value)
							<label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
							{{ $value->display_name }}</label>
							<br/>
						@endforeach
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 text-center">
						<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection