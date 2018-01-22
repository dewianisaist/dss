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
