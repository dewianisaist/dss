@extends('layouts.master_admin')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
 
@section('content_header')
<h1>
  Edit Jadwal Seleksi Pendaftar
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('selectionregistrants.index') }}"><i class="fa fa-calendar-check-o"></i> Manajemen Jadwal Seleksi Pendaftar</a></li>
  <li class="active">Edit Jadwal Seleksi Pendaftar</li>
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
		{!! Form::model($selection, ['method' => 'PATCH','route' => ['selectionregistrants.update', $selection->id]]) !!}
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
            <strong>Nama Pendaftar:</strong>
						{!! Form::select('registrant_id', $registrant, $registrantchoosen, array('class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
            <strong>Jadwal Seleksi:</strong>
						{!! Form::select('selection_schedule_id', $schedule, $schedulechoosen, array('class' => 'form-control')) !!}
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
