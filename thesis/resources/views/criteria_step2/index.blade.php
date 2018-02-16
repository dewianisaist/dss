@extends('layouts.master_admin')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
  
@section('content_header')
<h1>
    Kriteria Tahap 2
</h1>
<ol class="breadcrumb">
    <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Kriteria Tahap 2</li>
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
                    {{--  @permission('criteriastep2-create')  --}}
                    <a class="btn btn-success" href="{{ route('criteriastep2.create') }}"> Tambahkan Kriteria</a>
                    {{--  @endpermission  --}}
				</div>
			</div>
        </div>

        <br/>
        <table id="table_criteriastep2_fix" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria</th>
                    <th>Penjelasan Kriteria</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_fix as $key => $data_fiks)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $data_fiks->name }}</td>
                        <td>{{ $data_fiks->description }}</td>
                        <td>
                            {{--  @permission('criteriastep2-edit')  --}}
                            <a class="btn btn-primary" href="{{ route('criteriastep2.edit',$data_fiks->id) }}">Edit</a>
                            {{--  @endpermission  --}}
                            {{--  @permission('criteriastep2-delete')  --}}
                            {!! Form::open(['method' => 'DELETE','route' => ['criteriastep2.destroy', $data_fiks->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            {{--  @endpermission --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br/>
        <h3>Hasil Kriteria Tahap 1</h3>
        <table id="table_criteriastep2_standart" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria</th>
                    <th>Penjelasan Kriteria <small>(beserta sumber pustaka)</small></th>
                    <th>Kesesuaian (%)</th>
                    <th>Jumlah Sesuai dari Keseluruhan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_standart as $key => $data_baku)
                    <tr>
                        <td>{{ ++$j }}</td>
                        <td>{{ $data_baku->name }}</td>
                        <td>{{ $data_baku->description }}</td>
                        <td>{{ $data_baku->result }}</td>
                        <td>{{ $data_baku->sum }} dari {{ $data_baku->count }}</td>
                        <td>
                            {{--  @permission('criteriastep2-edit')  --}}
                            <a class="btn btn-primary" href="{{ route('criteriastep2.use',$data_baku->id) }}">Gunakan</a>
                            {{--  @endpermission  --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Masukan</h3>
        <table id="table_criteriastep2_suggestion" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria</th>
                    <th>Penjelasan Kriteria</th>
                    <th>Pengusul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_suggestion as $key => $data_masukan)
                    <tr>
                        <td>{{ ++$k }}</td>
                        <td>{{ $data_masukan->name }}</td>
                        <td>{{ $data_masukan->description }}</td>
                        <td>{{ $data_masukan->user_name }}</td>
                        <td>
                            {{--  @permission('criteriastep2-edit')  --}}
                            <a class="btn btn-primary" href="{{ route('criteriastep2.use',$data_masukan->id ) }}">Gunakan</a>
                            {{--  @endpermission  --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection