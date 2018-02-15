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

		<div class="panel panel-primary">
		<div class="panel-heading"><h4>Jadwal Seleksi</h4></div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Sub-Kejuruan:</strong>
							{{ $selection_schedule->name }}
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Tanggal Daftar:</strong>
							{{ $selection_schedule->register_date }}
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Tanggal Seleksi:</strong>
							{{ $selection_schedule->date }}
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Waktu Seleksi:</strong>
							{{ $selection_schedule->time }}
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Tempat Seleksi:</strong>
							{{ $selection_schedule->place }}
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Informasi Tambahan:</strong>
							{{ $selection_schedule->information }}
						</div>
					</div>
				</div>
			</div>
		</div>

		<h3>Riwayat Pendaftaran</h3>
    	<table id="table_registration" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Sub-Kejuruan</th>
					<th>Tanggal Daftar</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($selections as $key => $selection)
				<tr>
					<td>{{ ++$i }}</td>
					<td>{{ $selection->name }}</td>
					<td>{{ $selection->register_date }}</td>
					<td>
						@if ($selection->status == '') 
							Sedang Proses Penilaian
						@else
							{{ $selection->status }}
						@endif
					</td>
				</tr>		
				@endforeach
			</tbody>
		</table>
		{!! $selections->render() !!}
	</div>
</div>
@endsection
