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
						<h3>Hasil Seleksi Tertulis</h3>
					</div>
				</div>	
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nilai Pengetahuan <small>(Range nilai 0-100)</small>:</strong>
						{!! Form::text('knowledge_value', isset($selection->knowledge_value) ? $selection->knowledge_value : '', array('placeholder' => 'Nilai Pengetahuan','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nilai Keterampilan Teknis <small>(Range nilai 0-100)</small>:</strong>
						{!! Form::text('technical_value', isset($selection->technical_value) ? $selection->technical_value : '', array('placeholder' => 'Nilai Keterampilan Teknis','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<h3>Hasil Seleksi Wawancara<h3>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Rekomendasi:</strong>
						{!! Form::select('recommendation', 
							array(
								'Ya' => 'Ya', 
								'Tidak' => 'Tidak',
							), 
							isset($selection->recommendation) ? $selection->recommendation : '', array('class' => 'form-control')) 
						!!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nilai Kesan Baik <small>(Range nilai 0-100)</small>:</strong>
						{!! Form::text('impression_value', isset($selection->impression_value) ? $selection->impression_value : '', array('placeholder' => 'Nilai Kesan Baik','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nilai Kesungguhan <small>(Range nilai 0-100)</small>:</strong>
						{!! Form::text('seriousness_value', isset($selection->seriousness_value) ? $selection->seriousness_value : '', array('placeholder' => 'Nilai Kesungguhan','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nilai Percaya Diri <small>(Range nilai 0-100)</small>:</strong>
						{!! Form::text('confidence_value', isset($selection->confidence_value) ? $selection->confidence_value : '', array('placeholder' => 'Nilai Percaya Diri','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nilai Keterampilan Komunikasi <small>(Range nilai 0-100)</small>:</strong>
						{!! Form::text('communication_value', isset($selection->communication_value) ? $selection->communication_value : '', array('placeholder' => 'Nilai Keterampilan Komunikasi','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nilai Penampilan <small>(Range nilai 0-100)</small>:</strong>
						{!! Form::text('appearance_value', isset($selection->appearance_value) ? $selection->appearance_value : '', array('placeholder' => 'Nilai Penampilan','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nilai Pertimbangan Keluarga <small>(Range nilai 0-100)</small>:</strong>
						{!! Form::text('family_value', isset($selection->family_value) ? $selection->family_value : '', array('placeholder' => 'Nilai Pertimbangan Keluarga','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nilai Motivasi <small>(Range nilai 0-100)</small>:</strong>
						{!! Form::text('motivation_value', isset($selection->motivation_value) ? $selection->motivation_value : '', array('placeholder' => 'Nilai Motivasi','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nilai Sikap <small>(Range nilai 0-100)</small>:</strong>
						{!! Form::text('attitude_value', isset($selection->attitude_value) ? $selection->attitude_value : '', array('placeholder' => 'Nilai Sikap','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nilai Orientasi Masa Depan <small>(Range nilai 0-100)</small>:</strong>
						{!! Form::text('orientation_value', isset($selection->orientation_value) ? $selection->orientation_value : '', array('placeholder' => 'Nilai Orientasi Masa Depan','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nilai Komitmen <small>(Range nilai 0-100)</small>:</strong>
						{!! Form::text('commitment_value', isset($selection->commitment_value) ? $selection->commitment_value : '', array('placeholder' => 'Nilai Komitmen','class' => 'form-control')) !!}
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