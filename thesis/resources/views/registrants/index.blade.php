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
    <li class="active"><a href="{{ route('registrants.index') }}"><i class="fa fa-user"></i> Data Diri</a></li>
    {{--  <li><a href="{{ route('educational_background.index') }}"><i class="fa fa-user"></i> Riwayat Pendidikan</a></li>
	<li><a href="{{ route('course_experience.index') }}"><i class="fa fa-user"></i> Riwayat Pendidikan</a></li>  --}}
  </ul>
</li>
@endsection

@section('content_header')
<h1>
  Data Diri
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Data Diri</li>
</ol>
@endsection

@section('content')
<div class="box box-default">
    <div class="box-body">
		@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@endif

 		<div class="row">
			<div class="col-lg-12 margin-tb">
				<div class="pull-right mb-1">
					<a class="btn btn-success" href="{{ route('registrants.edit') }}"> Edit Data Diri</a>
				</div>
			</div>
   		</div>
		<br/>
    
	<table class="table table-striped">
		<tr>
			<th>Nama</th>
			<td>{{ $data->user->name }}</td>
		</tr>
		<tr>
			<th>NIK</th>
			<td>{{ $data->user->identity_number }}</td>
		</tr>
		<tr>
			<th>email</th>
			<td>{{ $data->user->email }}</td>
		</tr>
		<tr>
			<th>Alamat</th>
			<td>{{ $data->address }}</td>
		</tr>
		<tr>
			<th>No. Telepon/HP</th>
			<td>{{ $data->phone_number }}</td>
		</tr>
		<tr>
			<th>Jenis Kelamin</th>
			<td>{{ $data->gender }}</td>
		</tr>
		<tr>
			<th>Tempat, Tanggal Lahir</th>
			<td>{{ $data->place_birth }}, {{ $data->date_birth }}</td>
		</tr>
		<tr>
			<th>Anak ke-</th>
			<td>{{ $data->order_child }}</td>
		</tr>
		<tr>
			<th>Jumlah Saudara</th>
			<td>{{ $data->amount_sibling }}</td>
		</tr><tr>
			<th>Agama</th>
			<td>{{ $data->religion }}</td>
		</tr>
		<tr>
			<th>Nama Ibu Kandung</th>
			<td>{{ $data->biological_mother_name }}</td>
		</tr>
		<tr>
			<th>Nama Ayah</th>
			<td>{{ $data->father_name }}</td>
		</tr>
		<tr>
			<th>Alamat Orangtua</th>
			<td>{{ $data->parent_address }}</td>
		</tr>
		<tr>
			<th>Pas Foto</th>
			<td>{{ $data->upload->photo }}</td>
		</tr>
		<tr>
			<th>KTP</th>
			<td>{{ $data->upload->ktp }}</td>
		</tr>
		<tr>
			<th>Ijazah Terakhir</th>
			<td>{{ $data->upload->last_certificate }}</td>
		</tr>
	</table>
@endsection
