@extends('layouts.master_admin')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
  
@section('content_header')
<h1>
    Kuesioner Kriteria
</h1>
<ol class="breadcrumb">
    <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Kuesioner Kriteria</li>
</ol>
@endsection

@section('content')
<div class="box">
    <div class="box-body">
        <div class="alert alert-warning alert-dismissible">
            <h4><i class="icon fa fa-warning"></i> Peringatan!</h4>
            <ul>
                <li>Pilihlah kesesuaian masing-masing kriteria berdasarkan proses seleksi peserta pelatihan BLK Bantul.</li>
                <li>Klik <strong>Submit</strong> jika sudah yakin, karena jika sudah submit tidak diijinkan untuk mengubah pilihan.</li>
            </ul>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Maaf!</strong> Semua pilihan kriteria harus diisi.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {!! Form::open(array('route' => 'questionnaire.store','method'=>'POST')) !!}
            <table id="table_questionnaire" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kriteria</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    {{--  @foreach ($data as $key => $questionnaire)  --}}
                        <tr>
                            {{--  <td>{{ ++$i }}</td>
                            <td>{{ $questionnaire->criteria->name }}</td>
                            <td>{{ $questionnaire->choice->name }}</td>
                            <td>{{ $subvocational->quota }}</td>
                            <td>{{ $subvocational->long_training }}</td>
                            <td>{{ $subvocational->final_registration_date }}</td>  --}}
                        </tr>
                    {{--  @endforeach  --}}
                </tbody>
            </table>
            {!! $data->render() !!}

            {{--  <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    @foreach($user->roles as $key => $v)
                        <div class="radio">
                            <label>
                                @if ($key == 0) 
                                    <input type="radio" name="auth_role" value={{ $v->id }} checked> {{ $v->display_name }}
                                @else
                                    <input type="radio" name="auth_role" value={{ $v->id }}> {{ $v->display_name }}
                                @endif
                            </label>
                        </div>
					@endforeach
                </div>
            </div>  --}}

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection