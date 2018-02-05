@extends('layouts.master_admin')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
  
@section('content_header')
<h1>
	Buat Sumber Nilai Kriteria Baru
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('conversions.index') }}"><i class="fa fa-hourglass-half"></i> Sumber Nilai Kriteria</a></li>
  <li class="active">Buat Sumber Nilai Kriteria Baru</li>
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
		{!! Form::open(array('route' => 'conversions.store','method'=>'POST')) !!}
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Kriteria:</strong>
						{!! Form::select('criteria_id', $criteria, null, array('class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Sumber Data:</strong>
						{!! Form::select('resource', 
							array(
								'Pendidikan Terakhir' => 'Pendidikan Terakhir', 
								'Usia' => 'Usia',
								'Nilai Tertulis' => 'Nilai Tertulis',
								'Nilai Wawancara' => 'Nilai Wawancara',
								'Pengalaman Kursus' => 'Pengalaman Kursus',
								'Intensitas Keikutsertaan' => 'Intensitas Keikutsertaan'
				  		), 
				  		'', array('class' => 'form-control', 'id' => 'resource')) 
						!!}
					</div>
				</div>
				<div id="range_value" class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nilai Jangkauan:</strong>
						<br/>
						<div id="pendidikan">
							{!! Form::select('range_value_1', 
								array(
									'SD' => 'SD dan sederajat', 
									'SMP' => 'SMP dan sederajat',
									'SMA' => 'SMA dan sederajat',
									'D1' => 'D1',
									'D2' => 'D2',
									'D3' => 'D3',
									'D4' => 'D4',
									'S1' => 'S1',
									'S2' => 'S2',
									'S3' => 'S3',
									'Tidak Sekolah' => 'Tidak Sekolah',
								), 
								'', array('class' => 'form-control')) 
							!!}
						</div>
						<div id="wawancara">
							{!! Form::select('range_value_1', 
								array(
									'Sangat Baik' => 'Sangat Baik', 
									'Baik' => 'Baik',
									'Cukup' => 'Cukup',
									'Kurang' => 'Kurang',
									'Sangat Kurang' => 'Sangat Kurang'
								), 
								'', array('class' => 'form-control')) 
							!!}
						</div>
						<div id="start_value" class="col-xs-6">
							{!! Form::selectRange('range_value_1', 0, 100, null, array('class' => 'form-control')); !!}
						</div>
						<div id="end_value" class="col-xs-6">
							{!! Form::selectRange('range_value_2', 0, 100, null, array('class' => 'form-control')); !!}
						</div>
					</div>
				</div>
				<div id="conversion_value" class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nilai Konversi:</strong>
						{!! Form::text('conversion_value', null, array('placeholder' => 'Nilai Konversi','class' => 'form-control')) !!}
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
  	$(function () {
		$("#resource").change(function () {
			$( "#resource option:selected").each(function(){
				if ($(this).val() == "Pendidikan Terakhir") {
					$("#range_value").show();
					$("#conversion_value").show();
					$("#pendidikan").show();
					$("#wawancara").hide();
					$("#start_value").hide();
					$("#end_value").hide();
				} else if ($(this).val() == "Usia" || $(this).val() == "Pengalaman Kursus" || $(this).val() == "Intensitas Keikutsertaan") {
					$("#range_value").show();
					$("#conversion_value").show();
					$("#pendidikan").hide();
					$("#wawancara").hide();
					$("#start_value").show();
					$("#end_value").show();
				} else if ($(this).val() == "Nilai Wawancara") {
					$("#range_value").show();
					$("#conversion_value").show();
					$("#pendidikan").hide();
					$("#wawancara").show();
					$("#start_value").hide();
					$("#end_value").hide();
				} else {
					$("#range_value").hide();
					$("#conversion_value").hide();
				}

			});
		}).change();
	});
</script>
@endsection