@extends('layouts.master_registrant')

@section('sidebar_menu')
<li class="active treeview menu-open">
  <a href="{{ route('registrants.index') }}">
    <i class="fa fa-user"></i>
    <span>Profil</span>
  	<span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{ route('registrants.index') }}"><i class="fa fa-user"></i> Data Diri</a></li>
    <li><a href="{{ route('educational_background.index') }}"><i class="fa fa-user"></i> Riwayat Pendidikan</a></li>
		<li class="active"><a href="{{ route('course_experience.index') }}"><i class="fa fa-user"></i> Pengalaman Kursus/Pelatihan</a></li>
  </ul>
</li>
@endsection
 
@section('content_header')
<h1>
  Edit Pengalaman Kursus/Pelatihan
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('course_experience.index') }}"><i class="fa fa-user"></i> Pengalaman Kursus/Pelatihan</a></li>
  <li class="active">Edit Pengalaman Kursus/Pelatihan</li>
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
		{!! Form::model($course_experience, ['method' => 'PATCH','route' => ['course_experience.update', $course_experience->course_id]]) !!}
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
            <strong>Jurusan:</strong>
						{!! Form::select('course_id', $course, $coursechoosen, array('class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Penyelenggara:</strong>
						{!! Form::text('organizer', null, array('placeholder' => 'Nama Institusi Penyelenggara','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Tahun Lulus:</strong>
						{!! Form::text('graduation_year', null, array('placeholder' => 'Tahun Lulus','class' => 'form-control')) !!}
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
