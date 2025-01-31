@extends('layouts.master_admin')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
@endsection

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection

@section('content_header')
<h1>
  Edit Jadwal Seleksi
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('selectionschedules.index') }}"><i class="fa fa-calendar-o"></i> Manajemen Jadwal Seleksi</a></li>
  <li class="active">Edit Jadwal Seleksi</li>
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
		{!! Form::model($selectionschedule, ['method' => 'PATCH','route' => ['selectionschedules.update', $selectionschedule->id]]) !!}
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
            <strong>Sub-Kejuruan:</strong>
						{!! Form::select('sub_vocational_id', $subvocational, $subvocationalchoosen, array('class' => 'form-control')) !!}
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