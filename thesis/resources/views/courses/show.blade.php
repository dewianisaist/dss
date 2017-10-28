@extends('layouts.master_admin')

@section('content_header')
<h1>
  Detail Kursus
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('courses.index') }}"><i class="fa fa-university"></i> Manajemen Kursus</a></li>
  <li class="active">Detail Kursus</li>
</ol>
@endsection

@section('content')
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $course->major }}</h3>
    </div>
    <div class="box-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Jurusan:</strong>
					{{ $course->major }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection