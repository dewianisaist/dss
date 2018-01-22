@extends('layouts.master_admin')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
@endsection

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
 
@section('content_header')
<h1>
  Edit Sub-Kejuruan
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('subvocationals.index') }}"><i class="fa fa-industry"></i> Manajemen Sub-Kejuruan</a></li>
  <li class="active">Edit Sub-Kejuruan</li>
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
		{!! Form::model($subvocational, ['method' => 'PATCH','route' => ['subvocationals.update', $subvocational->id]]) !!}
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nama Sub-Kejuruan:</strong>
						{!! Form::text('name', null, array('placeholder' => 'Nama Sub-Kejuruan','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
            <strong>Kejuruan:</strong>
						{!! Form::select('vocational_id', $vocational, $vocationalchoosen, array('class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Kuota:</strong>
						{!! Form::text('quota', null, array('placeholder' => 'Kuota','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Lama Pelatihan:</strong>
						{!! Form::text('long_training', null, array('placeholder' => 'Lama Pelatihan (dalam satuan jam)','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Tujuan Pelatihan:</strong>
						{!! Form::textarea('goal', null, array('placeholder' => 'Tujuan Pelatihan','class' => 'form-control','style'=>'height:100px')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Unit Kompetensi:</strong>
						{!! Form::textarea('unit_competence', null, array('placeholder' => 'Unit Kompetensi','class' => 'form-control','style'=>'height:100px')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Persyaratan Peserta:</strong>
						{!! Form::textarea('requirement_participant', null, array('placeholder' => 'Persyaratan Peserta','class' => 'form-control','style'=>'height:100px')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
            <strong>Tanggal Akhir Pendaftaran:</strong>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
							{!! Form::text('final_registration_date', null, array('placeholder' => 'Tanggal Akhir Pendaftaran','class' => 'form-control pull-right', 'id' => 'datepicker')) !!}
            </div>
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
		format: 'YYYY-MM-DD HH:mm:ss'
	});
</script>
@endsection