@extends('layouts.master_admin')

@section('content_header')
<h1>
  Edit Kursus
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('courses.index') }}"><i class="fa fa-university"></i> Manajemen Kursus</a></li>
  <li class="active">Edit Kursus</li>
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
		{!! Form::model($course, ['method' => 'PATCH','route' => ['courses.update', $course->id]]) !!}
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Jurusan:</strong>
						{!! Form::text('major', null, array('placeholder' => 'Jurusan Kursus','class' => 'form-control')) !!}
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