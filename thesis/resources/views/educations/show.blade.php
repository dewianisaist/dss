@extends('layouts.master_admin')

@section('content_header')
<h1>
  Detail Pendidikan
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('educations.index') }}"><i class="fa fa-users"></i> Manajemen Pendidikan</a></li>
  <li class="active">Detail Pendidikan</li>
</ol>
@endsection

@section('content')
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $education->stage }}</h3>
    </div>
    <div class="box-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Jenjang:</strong>
					{{ $education->stage }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Jurusan:</strong>
					{{ $education->major }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection