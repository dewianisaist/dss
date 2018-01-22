@extends('layouts.master_admin')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
  
@section('content_header')
<h1>
  Edit Tipe Preferensi
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('preferences.index') }}"><i class="fa fa-hourglass-half"></i> Tipe Preferensi</a></li>
  <li class="active">Edit Tipe Preferensi</li>
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
		{!! Form::model($preference, ['method' => 'PATCH','route' => ['preferences.update', $preference->id]]) !!}
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Kriteria:</strong>
						{!! Form::text('name', isset($preference->name) ? $preference->name : '', array('placeholder' => 'Nama Kriteria','class' => 'form-control','disabled')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Tipe Preferensi:</strong>
            {!! Form::select('preference', 
              array(
                  'Tipe 1' => 'Tipe 1', 
                  'Tipe 2' => 'Tipe 2',
                  'Tipe 3' => 'Tipe 3',
                  'Tipe 4' => 'Tipe 4',
                  'Tipe 5' => 'Tipe 5',
                  'Tipe 6' => 'Tipe 6'
              ), 
              isset($preference->preference) ? $preference->preference : '', array('class' => 'form-control')) 
            !!}
					</div>
				</div>
        <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Kaidah (Maks/Min):</strong>
            {!! Form::select('max_min', 
              array(
                  'Maksimasi' => 'Maksimasi', 
                  'Minimasi' => 'Minimasi',
              ), 
              isset($preference->max_min) ? $preference->max_min : '', array('class' => 'form-control')) 
            !!}
					</div>
				</div>
        <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Parameter p:</strong>
						{!! Form::text('parameter_p', isset($preference->parameter_p) ? $preference->parameter_p : '', array('placeholder' => 'Parameter p','class' => 'form-control')) !!}
					</div>
				</div>
        <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Parameter q:</strong>
						{!! Form::text('parameter_q', isset($preference->parameter_q) ? $preference->parameter_q : '', array('placeholder' => 'Parameter q','class' => 'form-control')) !!}
					</div>
				</div>
        <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Parameter s:</strong>
						{!! Form::text('parameter_s', isset($preference->parameter_s) ? $preference->parameter_s : '', array('placeholder' => 'Parameter s','class' => 'form-control')) !!}
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