@extends('layouts.master_registrant')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
 
@section('content_header')
<h1>
  Pendaftaran Pelatihan
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Pendaftaran Pelatihan</li>
</ol>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-body">
        <div class="alert alert-warning alert-dismissible">
            <h4><i class="icon fa fa-warning"></i> Peringatan!</h4>
            <ul>
                <li>Anda hanya dapat mendaftar 1 sub-kejuruan dalam 1 kali proses seleksi.</li>
                <li>Klik <strong>Daftar</strong> jika sudah yakin, karena jika sedang dalam proses seleksi, Anda tidak diperbolehkan mendaftar lagi.</li>
                <li>Jika sudah dinyatakan tidak lolos, Anda baru diperbolehkan mendaftar lagi.</li>
            </ul>
        </div>

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

		{!! Form::open(array('route' => 'registration.store','method'=>'POST')) !!}
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
                        <strong>Pilih Sub-Kejuruan:</strong>
						{!! Form::select('sub_vocational_id', $subvocational,[], array('class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 text-center">
						<button type="submit" class="btn btn-primary">Daftar</button>
				</div>
			</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection