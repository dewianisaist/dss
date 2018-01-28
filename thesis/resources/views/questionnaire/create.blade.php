@extends('layouts.master_admin')

@section('css')
<style type="text/css"> 
    .checkbox label, .radio label{padding-left: 35px };} 
 </style>
@endsection

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
                <li>Klik Submit jika sudah yakin, karena <strong>jika sudah submit tidak diijinkan untuk mengubah pilihan.</strong></li>
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
                        <th>Penjelasan Kriteria <small>(beserta sumber pustaka)</small></th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($criteria as $key => $questionnaire)
                        <tr>
                            <td width="5px">{{ ++$i }}</td>
                            <td width="250px">{{ $questionnaire->name }}</td>
                            <td width="550px">{{ $questionnaire->description }}</td>
                            <td width="200px">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="{{ $questionnaire->id }}" value="1"> Sesuai 
                                    </label>
                                    <label>
                                        <input type="radio" name="{{ $questionnaire->id }}" value="0"> Tidak Sesuai 
                                    </label>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $criteria->render() !!}

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection