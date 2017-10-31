@extends('layouts.master_admin')
 
@section('content_header')
<h1>
  Manajemen Sub-Kejuruan
  <dfn><small>Control panel</small></dfn>
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Manajemen Sub-Kejuruan</li>
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
					{{--  @permission('subvocational-create')  --}}
					<a class="btn btn-success" href="{{ route('subvocationals.create') }}"> Tambahkan Sub-Kejuruan</a>
					{{--  @endpermission  --}}
				</div>
			</div>
		</div>
	
		<br/>
    	<table id="table_subvocationals" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Sub-Kejuruan</th>
					<th>Kejuruan</th>
					<th>Kuota</th>
					<th>Lama Pelatihan</th>
					<th>Tanggal Akhir Pendaftaran</th>
					<th width="280px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($data as $key => $subvocational)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $subvocational->name }}</td>
						<td>{{ $subvocational->vocational->name }}</td>
						<td>{{ $subvocational->quota }}</td>
						<td>{{ $subvocational->long_training }}</td>
						<td>{{ $subvocational->final_registration_date }}</td>

						<td>
							<a class="btn btn-info" href="{{ route('subvocationals.show',$subvocational->id) }}">Detail</a>
							{{--  @permission('subvocational-edit')  --}}
							<a class="btn btn-primary" href="{{ route('subvocationals.edit',$subvocational->id) }}">Edit</a>
							{{--  @endpermission  --}}
							{{--  @permission('subvocational-delete')  --}}
							{!! Form::open(['method' => 'DELETE','route' => ['subvocationals.destroy', $subvocational->id],'style'=>'display:inline']) !!}
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