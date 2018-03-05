@extends('layouts.master_admin')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
  
@section('content_header')
<h1>
  Detail Tipe Preferensi
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('preferences.index') }}"><i class="fa fa-hourglass-half"></i> Tipe Preferensi</a></li>
  <li class="active">Detail Tipe Preferensi</li>
</ol>
@endsection

@section('content')
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $preference->name }}</h3>
    </div>
    <div class="box-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Kriteria:</strong>
					{{ $preference->name }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Tipe Preferensi:</strong>
					{{ $preference->preference }}
				</div>
			</div>
      <div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Kaidah (Maks/Min):</strong>
					{{ $preference->max_min }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Parameter p:</strong>
					@if ($preference->preference == 1 || $preference->preference == 2 || $preference->preference == 6)
					-
					@else
						{{ $preference->parameter_p }}
					@endif
				</div>
			</div>
      <div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Parameter q:</strong>
					@if ($preference->preference == 1 || $preference->preference == 3 || $preference->preference == 6)
					-
					@else
						{{ $preference->parameter_q }}
					@endif
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Parameter s:</strong>
					@if ($preference->preference != 6)
					-
					@else
						{{ $preference->parameter_s }}
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection