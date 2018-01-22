@extends('layouts.master_admin')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
 
@section('content_header')
<h1>
  Detail Jadwal Seleksi
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('selectionschedules.index') }}"><i class="fa fa-calendar-o"></i> Manajemen Jadwal Seleksi</a></li>
  <li class="active">Detail Jadwal Seleksi</li>
</ol>
@endsection

@section('content')
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $selectionschedule->subvocational->name }}</h3>
    </div>
    <div class="box-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Sub-Kejuruan:</strong>
					{{ $selectionschedule->subvocational->name }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Tanggal:</strong>
					{{ $selectionschedule->date }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Waktu:</strong>
					{{ $selectionschedule->time }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Tempat:</strong>
					{{ $selectionschedule->place }}
				</div>
			</div>	
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Keterangan:</strong>
					{{ $selectionschedule->information }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection