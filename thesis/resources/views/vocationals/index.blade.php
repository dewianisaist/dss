@extends('layouts.master_admin')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
   
@section('content_header')
<h1>
  Manajemen Kejuruan
  <dfn><small>Control panel</small></dfn>
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Manajemen Kejuruan</li>
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

		@if ($message = Session::get('failed'))
			<div class="alert alert-error">
				<p>{{ $message }}</p>
			</div>
		@endif

		<div class="row">
			<div class="col-lg-12 margin-tb">
				<div class="pull-right mb-1">
					<a class="btn btn-success" href="{{ route('vocationals.create') }}"> Tambahkan Kejuruan</a>
				</div>
			</div>
		</div>
	
		<br/>
    	<table id="table_vocationals" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Deskripsi</th>
					<th width="280px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($vocationals as $key => $vocational)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $vocational->name }}</td>
						<td>{{ $vocational->description }}</td>
						<td>
							<a class="btn btn-info" href="{{ route('vocationals.show',$vocational->id) }}">Detail</a>
							<a class="btn btn-primary" href="{{ route('vocationals.edit',$vocational->id) }}">Edit</a>
							{!! Form::open(['method' => 'DELETE','route' => ['vocationals.destroy', $vocational->id],'style'=>'display:inline']) !!}
							{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
							{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{!! $vocationals->render() !!}
	</div>
</div>	
@endsection