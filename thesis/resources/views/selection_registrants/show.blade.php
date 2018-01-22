@extends('layouts.master_admin')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
 
@section('content_header')
<h1>
  Detail Jadwal Seleksi Pendaftar
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('selectionregistrants.index') }}"><i class="fa fa-calendar-check-o"></i> Manajemen Jadwal Seleksi Pendaftar</a></li>
  <li class="active">Detail Jadwal Seleksi Pendaftar</li>
</ol>
@endsection

@section('content')
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $selection_registrant->name_registrant }}</h3>
    </div>
    <div class="box-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Nama Pendaftar:</strong>
					{{ $selection_registrant->name_registrant }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Sub-Kejuruan:</strong>
					{{ $selection_registrant->name_sub_vocational }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Tanggal:</strong>
					{{ $selection_registrant->date }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Waktu:</strong>
					{{ $selection_registrant->time }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection