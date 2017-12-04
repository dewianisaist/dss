@extends('layouts.master_admin')
 
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
@endsection

@section('sidebar_menu')
<li><a href="{{ route('users.index') }}"><i class="fa fa-users"></i> <span>Data Pengguna</span></a></li>
<li><a href="{{ route('roles.index') }}"><i class="fa fa-key"></i>  <span>Data <dfn>Roles</dfn></span></a></li>
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
<li class="active"><a href="{{ route('selectionschedules.index') }}"><i class="fa fa-calendar-o"></i>  <span>Jadwal Seleksi</span></a></li>
<li><a href="{{ route('selections.index') }}"><i class="fa fa-balance-scale"></i>  <span>Nilai Seleksi</span></a></li>
<li><a href="{{ route('selectionregistrants.index') }}"><i class="fa fa-calendar-check-o"></i>  <span>Jadwal Seleksi Pendaftar</span></a></li>
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
  Buat Jadwal Seleksi Baru
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('selectionschedules.index') }}"><i class="fa fa-calendar-o"></i> Manajemen Jadwal Seleksi</a></li>
  <li class="active">Buat Jadwal Seleksi Baru</li>
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
		{!! Form::open(array('route' => 'selectionschedules.store','method'=>'POST')) !!}
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
            <strong>Sub-Kejuruan:</strong>
						{!! Form::select('sub_vocational_id', $subvocational,[], array('class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
            <strong>Tanggal:</strong>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
							{!! Form::text('date', null, array('placeholder' => 'Tanggal Seleksi','class' => 'form-control pull-right', 'id' => 'datepicker')) !!}
            </div>
          </div>
				</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
            <strong>Waktu:</strong>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-clock-o"></i>
              </div>
							{!! Form::text('time', null, array('placeholder' => 'Waktu Seleksi','class' => 'form-control pull-right', 'id' => 'timepicker')) !!}
            </div>
          </div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Tempat:</strong>
						{!! Form::text('place', null, array('placeholder' => 'Tempat Pelaksanaan Seleksi','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Keterangan:</strong>
						{!! Form::textarea('information', null, array('placeholder' => 'Informasi Tambahan','class' => 'form-control','style'=>'height:100px')) !!}
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

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script>
	$('#datepicker').datetimepicker({
		format: 'YYYY-MM-DD'
	});
</script>

<script>
	$('#timepicker').datetimepicker({
		format: 'HH:mm'
	});
</script>
@endsection