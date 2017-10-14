@extends('layouts.dashboard_admin')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left mb-1">
	            <h2>Manajemen Kejuruan</h2>
	        </div>
	        <div class="pull-right mb-1">
	        	{{--  @permission('kejuruan-create')  --}}
	            <a class="btn btn-success" href="{{ route('kejuruan.create') }}"> Tambahkan Kejuruan</a>
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
			<th>Sub Kejuruan</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($kejuruans as $key => $kejuruan)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $kejuruan->nama }}</td>
		<td></td>
		<td>
			<a class="btn btn-info" href="{{ route('kejuruan.show',$kejuruan->id) }}">Detail</a>
			{{--  @permission('kejuruan-edit')  --}}
			<a class="btn btn-primary" href="{{ route('kejuruan.edit',$kejuruan->id) }}">Edit</a>
			{{--  @endpermission  --}}
			{{--  @permission('kejuruan-delete')  --}}
			{!! Form::open(['method' => 'DELETE','route' => ['kejuruan.destroy', $kejuruan->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	{{--  @endpermission  --}}
		</td>
	</tr>
	@endforeach
	</table>
	{!! $kejuruans->render() !!}
@endsection