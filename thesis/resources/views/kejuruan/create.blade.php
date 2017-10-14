@extends('layouts.dashboard_admin')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left mb-1">
	            <h2>Buat Kejuruan Baru</h2>
	        </div>
	        <div class="pull-right mb-1">
	            <a class="btn btn-primary" href="{{ route('kejuruan.index') }}"> Kembali</a>
	        </div>
	    </div>
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
	{!! Form::open(array('route' => 'kejuruan.store','method'=>'POST')) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                {!! Form::text('nama', null, array('placeholder' => 'Nama Kejuruan','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Simpan</button>
        </div>
	</div>
	{!! Form::close() !!}
@endsection