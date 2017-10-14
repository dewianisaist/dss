@extends('layouts.dashboard_admin')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left mb-1">
	            <h2>Manajemen Kejuruan</h2>
	        </div>
	        <div class="pull-right mb-1">
	        	{{--  @permission('vocational-create')  --}}
	            <a class="btn btn-success" href="{{ route('vocationals.create') }}"> Tambahkan Kejuruan</a>
	            {{--  @endpermission  --}}
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Deskripsi</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($vocationals as $key => $vocational)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $vocational->name }}</td>
		<td>{{ $vocational->description }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('vocationals.show',$vocational->id) }}">Detail</a>
			{{--  @permission('vocational-edit')  --}}
			<a class="btn btn-primary" href="{{ route('vocationals.edit',$vocational->id) }}">Edit</a>
			{{--  @endpermission  --}}
			{{--  @permission('vocational-delete')  --}}
			{!! Form::open(['method' => 'DELETE','route' => ['vocationals.destroy', $vocational->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	{{--  @endpermission  --}}
		</td>
	</tr>
	@endforeach
	</table>
	{!! $vocationals->render() !!}
@endsection