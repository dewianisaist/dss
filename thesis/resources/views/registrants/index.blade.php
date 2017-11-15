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
    <li><a href="{{ route('educational_background.index') }}"><i class="fa fa-user"></i> Riwayat Pendidikan</a></li>
		<li><a href="{{ route('course_experience.index') }}"><i class="fa fa-user"></i> Pengalaman Kursus/Pelatihan</a></li>
  </ul>
</li>
<li class="active"><a href="{{ route('registration.index') }}"><i class="fa fa-pencil-square-o"></i> <span>Daftar</span></a></li>

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
			<td>{{ $user->name }}</td>
		</tr>
		<tr>
			<th>NIK</th>
			<td>{{ $user->identity_number }}</td>
		</tr>
		<tr>
			<th>email</th>
			<td>{{ $user->email }}</td>
		</tr>
		<tr>
			<th>Alamat</th>
			<td>{{ $user->registrant->address }}</td>
		</tr>
		<tr>
			<th>No. Telepon/HP</th>
			<td>{{ $user->registrant->phone_number }}</td>
		</tr>
		<tr>
			<th>Jenis Kelamin</th>
			<td>{{ $user->registrant->gender }}</td>
		</tr>
		<tr>
			<th>Tempat, Tanggal Lahir</th>
			<td>{{ $user->registrant->place_birth }}, {{ $user->registrant->date_birth }}</td>
		</tr>
		<tr>
			<th>Anak ke-</th>
			<td>{{ $user->registrant->order_child }}</td>
		</tr>
		<tr>
			<th>Jumlah Saudara</th>
			<td>{{ $user->registrant->amount_sibling }}</td>
		</tr><tr>
			<th>Agama</th>
			<td>{{ $user->registrant->religion }}</td>
		</tr>
		<tr>
			<th>Nama Ibu Kandung</th>
			<td>{{ $user->registrant->biological_mother_name }}</td>
		</tr>
		<tr>
			<th>Nama Ayah</th>
			<td>{{ $user->registrant->father_name }}</td>
		</tr>
		<tr>
			<th>Alamat Orangtua</th>
			<td>{{ $user->registrant->parent_address }}</td>
		</tr>
		<tr>
			<th>Pas Foto</th>
			<td><img width="250" src="{{ URL::to('/uploads/' . $user->registrant->upload->photo) }}" alt="{{ $user->name }}" /></td>
		</tr>
		<tr>
			<th>KTP</th>
			<td><a class="btn btn-success" href="{{ URL::to('/uploads/' . $user->registrant->upload->ktp) }}" target="_blank"> Lihat KTP</a></td>
		</tr>
		<tr>
			<th>Ijazah Terakhir</th>
			<td><a class="btn btn-success" href="{{ URL::to('/uploads/' . $user->registrant->upload->last_certificate) }}" target="_blank"> Lihat Ijazah Terakhir</a></td>
		</tr>
	</table>
@endsection
