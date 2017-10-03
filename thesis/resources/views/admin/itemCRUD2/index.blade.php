@extends('layouts.dashboard_admin')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left mb-1">
	            <h2>Items CRUD</h2>
	        </div>
	        <div class="pull-right mb-1">
	        	{{--  @permission('item-create')  --}}
	            <a class="btn btn-success" href="{{ route('admin.itemCRUD2.create') }}"> Tambahkan Item Baru</a>
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
			<th>Judul</th>
			<th>Deskripsi</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($items as $key => $item)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $item->title }}</td>
		<td>{{ $item->description }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('admin.itemCRUD2.show',$item->id) }}">Detail</a>
			{{--  @permission('item-edit')  --}}
			<a class="btn btn-primary" href="{{ route('admin.itemCRUD2.edit',$item->id) }}">Edit</a>
			{{--  @endpermission  --}}
			{{--  @permission('item-delete')  --}}
			{!! Form::open(['method' => 'DELETE','route' => ['admin.itemCRUD2.destroy', $item->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	{{--  @endpermission  --}}
		</td>
	</tr>
	@endforeach
	</table>
	{!! $items->render() !!}
@endsection