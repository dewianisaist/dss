@extends('layouts.dashboard_admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-1">
                <h2>Data Akun Pengguna</h2>
            </div>
            <div class="pull-right mb-1">
				{{--  @permission('user-create')  --}}
                <a class="btn btn-success" href="{{ route('users.create') }}"> Buat Akun Baru</a>
				{{--  @endpermission  --}}
			</div>
        </div>
    </div>

    @if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>No. Identitas</th>
			<th>Email</th>
			<th><dfn>Roles</dfn></th>
			<th width="280px">Action</th>
		</tr>
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
	</table>
	{!! $data->render() !!}
@endsection