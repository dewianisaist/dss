@extends('layouts.master_admin')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
 
@section('content_header')
<h1>
  Detail Sub-Kejuruan
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('subvocationals.index') }}"><i class="fa fa-industry"></i> Manajemen Sub-Kejuruan</a></li>
  <li class="active">Detail Sub-Kejuruan</li>
</ol>
@endsection

@section('content')
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $subvocational->name }}</h3>
    </div>
    <div class="box-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Nama Sub-Kejuruan:</strong>
					{{ $subvocational->name }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Kejuruan:</strong>
					{{ $subvocational->vocational->name }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Kuota:</strong>
					{{ $subvocational->quota }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Lama Pelatihan:</strong>
					{{ $subvocational->long_training }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Tujuan Pelatihan:</strong>
					{!! nl2br(e($subvocational->goal)) !!}
				</div>
			</div>	
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Unit Kompetensi:</strong>
					{!! nl2br(e($subvocational->unit_competence)) !!}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Persyaratan Peserta:</strong>
					{!! nl2br(e($subvocational->requirement_participant)) !!}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Tanggal Akhir Pendaftaran:</strong>
					{{ $subvocational->final_registration_date }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection