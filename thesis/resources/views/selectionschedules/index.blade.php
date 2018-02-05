@extends('layouts.master_admin')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
  
@section('content_header')
<h1>
  Manajemen Jadwal Seleksi
  <dfn><small>Control panel</small></dfn>
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Manajemen Jadwal Seleksi</li>
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
					@permission('selectionschedule-create')
					<a class="btn btn-success" href="{{ route('selectionschedules.create') }}"> Tambahkan Jadwal Seleksi</a>
					@endpermission
				</div>
			</div>
		</div>
	
		<br/>
    	<table id="table_selectionschedules" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Sub-Kejuruan</th>
					<th>Tanggal</th>
					<th>Waktu</th>
					<th>Tempat</th>
					<th>Keterangan</th>
					<th width="280px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($data as $key => $selectionschedule)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $selectionschedule->subvocational->name }}</td>
						<td>{{ $selectionschedule->date }}</td>
						<td>{{ $selectionschedule->time }}</td>
						<td>{{ $selectionschedule->place }}</td>
						<td>{{ $selectionschedule->information }}</td>
						<td>
							<a class="btn btn-info" href="{{ route('selectionschedules.show',$selectionschedule->id) }}">Detail</a>
							@permission('selectionschedule-edit')
							<a class="btn btn-primary" href="{{ route('selectionschedules.edit',$selectionschedule->id) }}">Edit</a>
							@endpermission
							@permission('selectionschedule-delete')
							{!! Form::open(['method' => 'DELETE','route' => ['selectionschedules.destroy', $selectionschedule->id],'style'=>'display:inline']) !!}
							{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
							{!! Form::close() !!}
							@endpermission
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{!! $data->render() !!}
	</div>
</div>	
@endsection