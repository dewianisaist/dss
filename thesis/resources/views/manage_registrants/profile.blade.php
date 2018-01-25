@extends('layouts.master_admin')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection

@section('content_header')
<h1>
  Data Diri
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('manage_registrants.index') }}"><i class="fa fa-users"></i> Data Pendaftar</a></li>
  <li class="active">Data Diri</li>
</ol>
@endsection

@section('content')
<div class="box box-default">
    <div class="box-body">
		<table class="table table-striped">
			<tr>
				<th>No. Identitas</th>
				<td>{{ $user->identity_number }}</td>
			</tr>
			<tr>
				<th>Nama</th>
				<td>{{ $user->name }}</td>
			</tr>
			<tr>
				<th>email</th>
				<td>{{ $user->email }}</td>
			</tr>
			<tr>
				<th>Alamat</th>
				<td>{{ $user->address }}</td>
			</tr>
			<tr>
				<th>No. Telepon/HP</th>
				<td>{{ $user->phone_number }}</td>
			</tr>
			<tr>
				<th>Jenis Kelamin</th>
				<td>{{ $user->gender }}</td>
			</tr>
			<tr>
				<th>Tempat, Tanggal Lahir</th>
				<td>{{ $user->place_birth }}, {{ $user->date_birth }}</td>
			</tr>
			<tr>
				<th>Anak ke-</th>
				<td>{{ $user->order_child }}</td>
			</tr>
			<tr>
				<th>Jumlah Saudara</th>
				<td>{{ $user->amount_sibling }}</td>
			</tr><tr>
				<th>Agama</th>
				<td>{{ $user->religion }}</td>
			</tr>
			<tr>
				<th>Nama Ibu Kandung</th>
				<td>{{ $user->biological_mother_name }}</td>
			</tr>
			<tr>
				<th>Nama Ayah</th>
				<td>{{ $user->father_name }}</td>
			</tr>
			<tr>
				<th>Alamat Orangtua</th>
				<td>{{ $user->parent_address }}</td>
			</tr>
			<tr>
				<th>Pas Foto</th>
				<td><img width="200" src="{{ isset($user->photo) ? URL::to('/uploads/' . $user->photo) : URL::to('/avatars/avatar.png') }}" alt="{{ $user->name }}" /></td>
			</tr>
			<tr>
				<th>KTP</th>
				<td><a class="btn btn-success" href="{{ URL::to('/uploads/' . $user->ktp) }}" target="_blank"> Lihat KTP</a></td>
			</tr>
			<tr>
				<th>Ijazah Terakhir</th>
				<td><a class="btn btn-success" href="{{ URL::to('/uploads/' . $user->last_certificate) }}" target="_blank"> Lihat Ijazah Terakhir</a></td>
			</tr>
		</table>
	</div>
</div>
@endsection
