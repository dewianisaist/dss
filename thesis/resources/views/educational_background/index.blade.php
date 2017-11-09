@extends('layouts.master_registrant')

@section('sidebar_menu')
<li class="active treeview menu-open">
  <a href="{{ route('registrants.index') }}">
    <i class="fa fa-user"></i>
    <span>Profil</span>
  	<span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{ route('registrants.index') }}"><i class="fa fa-user"></i> Data Diri</a></li>
    <li class="active"><a href="{{ route('educational_background.index') }}"><i class="fa fa-user"></i> Riwayat Pendidikan</a></li>
	{{--  <li><a href="{{ route('course_experience.index') }}"><i class="fa fa-user"></i> Riwayat Pendidikan</a></li>  --}}
  </ul>
</li>
@endsection

@section('content_header')
<h1>
  Riwayat Pendidikan
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Riwayat Pendidikan</li>
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
					<a class="btn btn-success" href="{{ route('educational_background.create') }}"> Tambah</a>
				</div>
			</div>
		</div>

		<br/>
    	<table id="table_educational_background" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Institusi</th>
					{{--  <th>Jenjang dan Jurusan</th>  --}}
					<th>Tahun Lulus</th>
					<th width="280px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($educational_backgrounds as $key => $educational_background)
				<tr>
					<td>{{ ++$i }}</td>
					<td>{{ $educational_background->name_institution }}</td>
					{{--  <td>{{ $educational_background->stage }}</td>  --}}
					<td>{{ $educational_background->graduation_year }}</td>
					<td>
						<a class="btn btn-info" href="{{ route('educational_background.show',$educational_background->education_id) }}">Detail</a>
						<a class="btn btn-primary" href="{{ route('educational_background.edit',$educational_background->education_id) }}">Edit</a>
						{!! Form::open(['method' => 'DELETE','route' => ['educational_background.destroy', $educational_background->education_id],'style'=>'display:inline']) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
					</td>
				</tr>		
				@endforeach
			</tbody>
		</table>
		{!! $educational_backgrounds->render() !!}
	</div>
</div>
@endsection
