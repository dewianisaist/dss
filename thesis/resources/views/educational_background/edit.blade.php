@extends('layouts.master_registrant')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
  
@section('content_header')
<h1>
  Edit Riwayat Pendidikan
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('educational_background.index') }}"><i class="fa fa-user"></i> Riwayat Pendidikan</a></li>
  <li class="active">Edit Riwayat Pendidikan</li>
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
		{!! Form::model($educational_background, ['method' => 'PATCH','route' => ['educational_background.update', 
							$educational_background->education_id, $educational_background->name_institution, 
							$educational_background->graduation_year]]) !!}
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
            			<strong>Jenjang dan Jurusan:</strong>
						{!! Form::select('education_id', $education, $educationchoosen, array('class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nama Institusi:</strong>
						{!! Form::text('name_institution', null, array('placeholder' => 'Nama Institusi','class' => 'form-control')) !!}
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
