@extends('layouts.master_admin')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
  
@section('content_header')
<h1>
  Manajemen Jadwal Seleksi Pendaftar
  <dfn><small>Control panel</small></dfn>
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Manajemen Jadwal Seleksi Pendaftar</li>
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
					{{--  @permission('selectionregistrant-create')  --}}
					<a class="btn btn-success" href="{{ route('selectionregistrants.create') }}"> Tambahkan Jadwal Seleksi Pendaftar</a>
					{{--  @endpermission  --}}
				</div>
			</div>
		</div>

		<br/>
    	<table id="table_selections" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Pendaftar</th>
					<th>Sub-Kejuruan</th>
					<th>Tanggal</th>
					<th>Waktu</th>
					<th>Tempat</th>
					<th width="280px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($data as $key => $selectionregistrant)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $selectionregistrant->name_registrant }}</td>
						<td>{{ $selectionregistrant->name_sub_vocational }}</td>
						<td>{{ $selectionregistrant->date }}</td>
						<td>{{ $selectionregistrant->time }}</td>
						<td>{{ $selectionregistrant->place }}</td>
						<td>
							<a class="btn btn-info" href="{{ route('selectionregistrants.show',$selectionregistrant->id) }}">Detail</a>
							{{--  @permission('selectionregistrant-edit')  --}}
							<a class="btn btn-primary" href="{{ route('selectionregistrants.edit',$selectionregistrant->id) }}">Edit</a>
							{{--  @endpermission  --}}
							{{--  @permission('selectionregistrant-delete')  --}}
							{!! Form::open(['method' => 'DELETE','route' => ['selectionregistrants.destroy', $selectionregistrant->id],'style'=>'display:inline']) !!}
							{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
							{!! Form::close() !!}
							{{--  @endpermission --}}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{!! $data->render() !!}
	</div>
</div>	
@endsection