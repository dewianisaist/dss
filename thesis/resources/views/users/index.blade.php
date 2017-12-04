@extends('layouts.master_admin')

@section('sidebar_menu')
<li class="active"><a href="{{ route('users.index') }}"><i class="fa fa-users"></i> <span>Data Pengguna</span></a></li>
<li><a href="{{ route('roles.index') }}"><i class="fa fa-key"></i>  <span>Data <dfn>Roles</dfn></span></a></li>
<li class="treeview">
  <a href="{{ route('vocationals.index') }}">
    <i class="fa fa-industry"></i>
    <span>Program</span>
  	<span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{ route('vocationals.index') }}"><i class="fa fa-industry"></i> Kejuruan</a></li>
    <li><a href="{{ route('subvocationals.index') }}"><i class="fa fa-industry"></i> Sub-Kejuruan</a></li>
  </ul>
</li>
<li><a href="{{ route('educations.index') }}"><i class="fa fa-graduation-cap"></i>  <span>Pendidikan</span></a></li>
<li><a href="{{ route('courses.index') }}"><i class="fa fa-university"></i>  <span>Kursus</span></a></li>
<li><a href="{{ route('selectionschedules.index') }}"><i class="fa fa-calendar-o"></i>  <span>Jadwal Seleksi</span></a></li>
<li><a href="{{ route('selections.index') }}"><i class="fa fa-balance-scale"></i>  <span>Nilai Seleksi</span></a></li>
<li><a href="{{ route('selectionregistrants.index') }}"><i class="fa fa-calendar-check-o"></i>  <span>Jadwal Seleksi Pendaftar</span></a></li>
<li class="treeview">
  <a href="{{ route('preferences.index') }}">
    <i class="fa fa-hourglass-half"></i>
    <span>Penilaian</span>
  	<span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{ route('preferences.index') }}"><i class="fa fa-hourglass-half"></i>  <span>Preferensi</span></a></li>
    {{--  <li><a href="{{ route('preferences.index') }}"><i class="fa fa-hourglass-half"></i>  <span>Hasil</a></li>  --}}
  </ul>
</li>
@endsection

@section('content_header')
<h1>
  Data Akun Pengguna
  <dfn><small>Control panel</small></dfn>
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Data Pengguna</li>
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
					{{--  @permission('user-create')  --}}
					<a class="btn btn-success" href="{{ route('users.create') }}"> Buat Akun Baru</a>
					{{--  @endpermission  --}}
				</div>
			</div>
		</div>

		<br/>
    	<table id="table_users" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>No. Identitas</th>
					<th>Email</th>
					<th><dfn>Roles</dfn></th>
					<th width="280px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($data as $key => $user)
				<tr>
					<td>{{ ++$i }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->identity_number }}</td>
					<td>{{ $user->email }}</td>
					<td>
						@if(!empty($user->roles))
							@foreach($user->roles as $v)
								<label class="label label-success">{{ $v->display_name }}</label>
							@endforeach
						@endif
					</td>
					<td>
						<a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Detail</a>
						{{--  @permission('user-edit')  --}}
						<a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
						{{--  @endpermission  --}}
						{{--  @permission('user-delete')  --}}
						{!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
						{{--  @endpermission  --}}
					</td>
				</tr>		
				@endforeach
			</tbody>
		</table>
		{!! $data->render() !!}
	</div>
</div>
@endsection
