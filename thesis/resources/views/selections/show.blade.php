@extends('layouts.master_admin')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
 
@section('content_header')
<h1>
  Detail Nilai Seleksi
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('selections.index') }}"><i class="fa fa-balance-scale"></i> Manajemen Nilai Seleksi</a></li>
  <li class="active">Detail Nilai Seleksi</li>
</ol>
@endsection

@section('content')
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $selection->name_registrant }}</h3>
    </div>
    <div class="box-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Nama Pendaftar:</strong>
					{{ $selection->name_registrant }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Sub-Kejuruan:</strong>
					{{ $selection->name_sub_vocational }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Tanggal:</strong>
					{{ $selection->date }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Waktu:</strong>
					{{ $selection->time }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<h3>Hasil Seleksi Tertulis</h3>
				</div>
			</div>	
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Nilai Pengetahuan:</strong>
					{{ $selection->knowledge_value }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Nilai Keterampilan Teknis:</strong>
					{{ $selection->technical_value }}
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
					{{ $selection->recommendation }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Nilai Kesan Baik:</strong>
					{{ $selection->impression_value }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Nilai Kesungguhan:</strong>
					{{ $selection->seriousness_value }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Nilai Percaya Diri:</strong>
					{{ $selection->confidence_value }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Nilai Keterampilan Komunikasi:</strong>
					{{ $selection->communication_value }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Nilai Penampilan:</strong>
					{{ $selection->appearance_value }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Nilai Pertimbangan Keluarga:</strong>
					{{ $selection->family_value }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Nilai Motivasi:</strong>
					{{ $selection->motivation_value }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Nilai Sikap:</strong>
					{{ $selection->attitude_value }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Nilai Orientasi Masa Depan:</strong>
					{{ $selection->orientation_value }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Nilai Komitmen:</strong>
					{{ $selection->commitment_value }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection