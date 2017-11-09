@extends('layouts.master_registrant')

@section('sidebar_menu')
<li class="active treeview menu-open">
  <a href="{{ route('registrants.index') }}">
    <i class="fa fa-user"></i>
    <span>Profil</span>
  	<span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{ route('registrants.index') }}"><i class="fa fa-user"></i> Data Diri</a></li>
    <li><a href="{{ route('educational_background.index') }}"><i class="fa fa-user"></i> Riwayat Pendidikan</a></li>
	<li class="active"><a href="{{ route('course_experience.index') }}"><i class="fa fa-user"></i> Pengalaman Kursus/Pelatihan</a></li>
  </ul>
</li>
@endsection

@section('content_header')
<h1>
  Pengalaman Kursus/Pelatihan
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Pengalaman Kursus/Pelatihan</li>
</ol>
@endsection

@section('content')
<div class="box">
	<div class="box-body">
		@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@endif

		<div class="row">
			<div class="col-lg-12 margin-tb">
				<div class="pull-right mb-1">
					<a class="btn btn-success" href="{{ route('course_experience.create') }}"> Tambah</a>
				</div>
			</div>
		</div>

		<br/>
    	<table id="table_course_experience" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					{{--  <th>Jurusan</th>  --}}
					<th>Penyelenggara</th>
					<th>Tahun Lulus</th>
					<th width="280px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($course_experiences as $key => $course_experience)
				<tr>
					<td>{{ ++$i }}</td>
					{{--  <td>{{ $course_experience->course_id }}</td>  --}}
					<td>{{ $course_experience->organizer }}</td>
					<td>{{ $course_experience->graduation_year }}</td>
					<td>
						<a class="btn btn-info" href="{{ route('course_experience.show',$course_experience->course_id) }}">Detail</a>
						<a class="btn btn-primary" href="{{ route('course_experience.edit',$course_experience->course_id) }}">Edit</a>
						{!! Form::open(['method' => 'DELETE','route' => ['course_experience.destroy', $course_experience->course_id],'style'=>'display:inline']) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
					</td>
				</tr>		
				@endforeach
			</tbody>
		</table>
		{!! $course_experiences->render() !!}
	</div>
</div>
@endsection
