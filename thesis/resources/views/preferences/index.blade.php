@extends('layouts.master_admin')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
   
@section('content_header')
<h1>
  Tipe Preferensi
  <dfn><small>Control panel</small></dfn>
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Tipe Preferensi</li>
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

		<br/>
    	<table id="table_preferences" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Kriteria</th>
					<th>Tipe Preferensi</th>
					<th>Kaidah (Maks/Min)</th>
					<th>Parameter p</th>
					<th>Parameter q</th>
					<th>Parameter s</th>
					<th width="280px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($preferences as $key => $preference)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $preference->name }}</td>
						<td>{{ $preference->preference }}</td>
						<td>{{ $preference->max_min }}</td>
						<td>{{ $preference->parameter_p }}</td>
						<td>{{ $preference->parameter_q }}</td>
						<td>{{ $preference->parameter_s }}</td>
						<td>
							<a class="btn btn-info" href="{{ route('preferences.show',$preference->id) }}">Detail</a>
							<a class="btn btn-primary" href="{{ route('preferences.edit',$preference->id) }}">Edit</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{!! $preferences->render() !!}
	</div>
</div>	
@endsection