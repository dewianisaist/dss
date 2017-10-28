@extends('layouts.master_admin')

@section('content_header')
<h1>
  Detail Kejuruan
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('vocationals.index') }}"><i class="fa fa-industry"></i> Manajemen Kejuruan</a></li>
  <li class="active">Detail Kejuruan</li>
</ol>
@endsection

@section('content')
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $vocational->name }}</h3>
    </div>
    <div class="box-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Nama:</strong>
					{{ $vocational->name }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Deskripsi:</strong>
					{{ $vocational->description }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection