@extends('layouts.dashboard_registrant')

@section('content')
 <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-1">
                <h2>Profil</h2>
            </div>
            <div class="pull-right mb-1">
				{{--  @permission('registrant-edit')  --}}
                <a class="btn btn-success" href="{{ route('registrants.edit') }}"> Edit</a>
				{{--  @endpermission  --}}
			</div>
        </div>
    </div>

    @if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-striped">
		@foreach ($data as $key => $registrant)
		<tr>
			<th>Nama</th>
			<td>{{ $registrant->name }}</td>
		</tr>
		<tr>
			<th>NIK</th>
			<td>{{ $registrant->identity_number }}</td>
		</tr>
		<tr>
			<th>email</th>
			<td>{{ $registrant->email }}</td>
		</tr>
		<tr>
			<th>Password</th>
			<td>{{ $registrant->password }}</td>
		</tr>
		<tr>
			<th>Alamat</th>
			<td>{{ $registrant->address }}</td>
		</tr>
		<tr>
			<th>No. Telepon/HP</th>
			<td>{{ $registrant->phone_number }}</td>
		</tr>
		<tr>
			<th>Jenis Kelamin</th>
			<td>{{ $registrant->gender }}</td>
		</tr>
		<tr>
			<th>Tempat, Tanggal Lahir</th>
			<td>{{ $registrant->place_birth }}, {{ $registrant->date_birth }}</td>
		</tr>
		<tr>
			<th>Anak ke-</th>
			<td>{{ $registrant->order_child }}</td>
		</tr>
		<tr>
			<th>Jumlah Saudara</th>
			<td>{{ $registrant->amount_sibling }}</td>
		</tr><tr>
			<th>Agama</th>
			<td>{{ $registrant->religion }}</td>
		</tr>
		<tr>
			<th>Nama Ibu Kandung</th>
			<td>{{ $registrant->biological_mother_name }}</td>
		</tr>
		<tr>
			<th>Nama Ayah</th>
			<td>{{ $registrant->father_name }}</td>
		</tr>
		<tr>
			<th>Alamat Orangtua</th>
			<td>{{ $registrant->parent_address }}</td>
		</tr>
		@endforeach
	</table>
	{!! $data->render() !!}
@endsection
