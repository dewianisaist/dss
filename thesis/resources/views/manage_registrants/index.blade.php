@extends('layouts.master_admin')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection

@section('content_header')
<h1>
  Data Pendaftar
  <dfn><small>Control panel</small></dfn>
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Data Pendaftar</li>
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
					{{--  @permission('manage_registrants-create')  --}}
					<a class="btn btn-success" href="{{ route('manage_registrants.create') }}"> Pendaftaran Pendaftar</a>
					{{--  @endpermission  --}}
				</div>
			</div>
		</div>

		<br/>
    	<table id="table_manage_registrants" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>NIK</th>
					<th>Email</th>
          <th>Alamat</th>
          <th>No. Telepon/HP</th>
          <th>Tempat, Tanggal Lahir</th>
          <th width="280px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($data as $key => $user)
				<tr>
					<td>{{ ++$i }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->identity_number }}</td>
          <td>{{ $user->email }}</td>
          {{--  <td>{{ $user->registrant->address }}</td>
          <td>{{ $user->registrant->phone_number }}</td>
          <td>{{ $user->registrant->place_birth }}, {{ $user->registrant->date_birth }}</td>  --}}
					<td>
						<a class="btn btn-info" href="{{ route('manage_registrants.show',$user->id) }}">Detail</a>
						{{--  @permission('manage_registrants-edit')  --}}
						<a class="btn btn-primary" href="{{ route('manage_registrants.edit',$user->id) }}">Edit</a>
						{{--  @endpermission  --}}
						{{--  @permission('manage_registrants-delete')  --}}
						{!! Form::open(['method' => 'DELETE','route' => ['manage_registrants.destroy', $user->id],'style'=>'display:inline']) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
						{{--  @endpermission  --}}
					</td>
				</tr>		
				@endforeach
			</tbody>
		</table>
		{!! $data->render() !!}
	</div>
</div>
@endsection
