@extends('layouts.master_admin')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
   
@section('content_header')
<h1>
  Sumber Nilai Kriteria 
  <dfn><small>Control panel</small></dfn>
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Sumber Nilai Kriteria</li>
</ol>
@endsection

@section('content')
<div class="box">
	<div class="box-body">
		<div class="alert alert-warning alert-dismissible">
			<h4><i class="icon fa fa-warning"></i> Peringatan!</h4>
			<ul>
				<li><strong>Data Kualitatif</strong> memiliki nilai jangkauan dan nilai konversi.</li>
				<li><strong>Data Kuantitatif</strong> tidak memiliki nilai jangkauan dan nilai konversi.</li>
			</ul>
		</div>

		@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@endif

		<div class="row">
			<div class="col-lg-12 margin-tb">
				<div class="pull-right mb-1">
					<a class="btn btn-success" href="{{ route('conversions.create') }}"> Tambah</a>
				</div>
			</div>
		</div>
	
		<br/>
    	<table id="table_conversions" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Kriteria</th>
					<th>Sumber Data</th>
					<th>Nilai Jangkauan</th>
					<th>Nilai Konversi</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($conversions as $key => $conversion)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $conversion->criteria->name }}</td>
						<td>{{ $conversion->resource }}</td>
						<td>{{ $conversion->range_value_1 }} - {{ $conversion->range_value_2 }}</td>
						<td>{{ $conversion->conversion_value }}</td>
						<td>
							<a class="btn btn-primary" href="{{ route('conversions.edit',$conversion->id) }}">Edit</a>
							{!! Form::open(['method' => 'DELETE','route' => ['conversions.destroy', $conversion->id],'style'=>'display:inline']) !!}
							{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
							{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{!! $conversions->render() !!}
	</div>
</div>	
@endsection