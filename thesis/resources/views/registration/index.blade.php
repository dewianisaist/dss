@extends('layouts.master_registrant')

@section('sidebar_menu')
<li class="treeview">
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
<li class="active"><a href="{{ route('registration.index') }}"><i class="fa fa-pencil-square-o"></i> <span>Daftar</span></a></li>
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
<div class="box">
	<div class="box-body">
		@if ($message = Session::get('failed'))
			<div class="alert alert-error">
				<p>{{ $message }}</p>
			</div>
		@endif
		@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@endif

		<br/>
    	<table id="table_registration" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Sub-Kejuruan</th>
					<th>Tanggal Daftar</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($registrations as $key => $registration)
				<tr>
					<td>{{ ++$i }}</td>
					<td>{{ $registration->subvocational->name }}</td>
					<td>{{ $registration->register_date }}</td>
				</tr>		
				@endforeach
			</tbody>
		</table>
		{!! $registrations->render() !!}
	</div>
</div>
@endsection
