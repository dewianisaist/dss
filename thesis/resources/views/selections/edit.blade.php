@extends('layouts.master_admin')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
 
@section('content_header')
<h1>
  Input Nilai Seleksi
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('selections.index') }}"><i class="fa fa-balance-scale"></i> Manajemen Nilai Seleksi</a></li>
  <li class="active">Input Nilai Seleksi</li>
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
		{!! Form::model($selection, ['method' => 'PATCH','route' => ['selections.update', $selection->id]]) !!}
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
            <strong>Nama Pendaftar:</strong>
						{!! Form::text('name_registrant', isset($selection->name_registrant) ? $selection->name_registrant : '', array('class' => 'form-control','disabled')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
            <strong>Sub-Kejuruan:</strong>
						{!! Form::text('name_sub_vocational', isset($selection->name_sub_vocational) ? $selection->name_sub_vocational: '', array('class' => 'form-control','disabled')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
            <strong>Tanggal:</strong>
						{!! Form::text('date', isset($selection->date) ? $selection->date : '', array('class' => 'form-control pull-right','disabled')) !!}
          </div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
            <strong>Waktu:</strong>
						{!! Form::text('time', isset($selection->time) ? $selection->time : '', array('class' => 'form-control pull-right','disabled')) !!}
          </div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nilai Tes Tertulis:</strong>
						{!! Form::text('written_value', isset($selection->written_value) ? $selection->written_value : '', array('placeholder' => 'Nilai Tes Tertulis','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nilai Tes Wawancara:</strong>
						{!! Form::text('interview_value', isset($selection->interview_value) ? $selection->interview_value : '', array('placeholder' => 'Nilai Tes Wawancara','class' => 'form-control')) !!}
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