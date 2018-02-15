@extends('layouts.master_admin')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
   
@section('content_header')
<h1>
  Hierarki (Kelompok Kriteria)
  <dfn><small>Control panel</small></dfn>
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Hierarki (Kelompok Kriteria)</li>
</ol>
@endsection

@section('content')
<div class="box">
	<div class="box-body">
		<div class="alert alert-warning alert-dismissible">
			<h4><i class="icon fa fa-warning"></i> Peringatan!</h4>
			<ul>
				<li><strong>Kelompok kriteria minimal harus terdiri dari tiga kriteria</strong>, jika kurang dari itu maka tidak perlu dikelompokkan.</li>
			</ul>
		</div>
		
		{{--  @permission('criteriagroup-create')  --}}
		@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@endif

		{!! Form::open(array('route' => 'criteriagroup.store','method'=>'POST')) !!}
		<div class="panel panel-primary">
			<div class="panel-heading"><h4>Tambah/Edit Kelompok Kriteria</h4></div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Nama Kelompok Kriteria:</strong>
							{!! Form::text('name', null, array('placeholder' => 'Nama Kelompok Kriteria','class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 text-center">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
		{{--  @endpermission  --}}

		{{--  <div class="row">
			<div class="col-lg-12 margin-tb">
				<div class="pull-right mb-1">
					<a class="btn btn-success" href="{{ route('criteriagroup.create') }}"> Tambahkan Kelompok</a>
				</div>
			</div>
		</div>
		
		<br/>
    	<table id="table_criteriagroup" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Kriteria</th>
					<th>Penjelasan Kriteria</th>
					<th>Kelompok Kriteria</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($criterias_group as $key => $kelompok_kriteria)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $kelompok_kriteria->name }}</td>
						<td>{{ $kelompok_kriteria->description }}</td>
						<td>
							@if(isset($kelompok_kriteria->description))
								{{ $kelompok_kriteria->group_name }}
							@else
								<h4><span class="label label-info">Kelompok Kriteria</span></h4>
							@endif
						</td>
						<td>
							@if(isset($kelompok_kriteria->description))
								<a class="btn btn-primary" href="{{ route('criteriagroup.edit',$kelompok_kriteria->id) }}">Edit</a>
								<a class="btn btn-primary" href="{{ route('criteriagroup.clear',$kelompok_kriteria->id) }}">Clear</a>
							@else
								<a class="btn btn-primary" href="{{ route('criteriagroup.edit_group',$kelompok_kriteria->id) }}">Edit</a>
								{!! Form::open(['method' => 'DELETE','route' => ['criteriagroup.destroy', $kelompok_kriteria->id],'style'=>'display:inline']) !!}
								{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
								{!! Form::close() !!}
							@endif
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>  --}}

		<h3>Hierarki Kriteria</h3>
		<table id="table_criteriagroup" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
					
			</tbody>
		</table>

		<br/>
		<h3>Kriteria</h3>
        <table id="table_criteriastep2_fix" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($criterias_fix as $key => $kriteria_fiks)
                    <tr>
                        <td>{{ ++$j }}</td>
                        <td width = "500px">{{ $kriteria_fiks->name }}</td>
                        <td>
							<div class="col-xs-9">
							{!! Form::select('group_criteria', $list_group, null, array('class' => 'form-control')) !!}
							</div>
							<div class="col-xs-1">
							<a class="btn btn-primary" href="{{ route('criteriagroup.edit',$kriteria_fiks->id) }}">Kelompokkan</a>
							</div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
	</div>
</div>	
@endsection