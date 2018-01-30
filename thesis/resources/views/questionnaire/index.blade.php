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
        <div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i> Anda Sudah Mengisi Kuesioner Kriteria!</h4>
            <ul>
                <li>Terimakasih Anda telah mengisi kuesioner kriteria.</li>
                <li>Hasil kalkulasi dapat dilihat di sub-menu <strong>Hasil Kriteria Tahap 1.</strong></li>
            </ul>
        </div>
        
        <table id="table_questionnaire_standart" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria</th>
                    <th>Penjelasan Kriteria <small>(beserta sumber pustaka)</small></th>
                    <th>Pilihan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_standart as $key => $data_baku)
                    <tr>
                        <td width="5px">{{ ++$i }}</td>
                        <td width="250px">{{ $data_baku->criteria->name }}</td>
                        <td width="550px">{{ $data_baku->criteria->description }}</td>
                        <td width="200px">
                            @if ($data_baku->option == 1) 
                                Sesuai
                            @else
                                Tidak Sesuai
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Masukan</h3>
        <table id="table_questionnaire_suggestion" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria</th>
                    <th>Penjelasan Kriteria <small>(beserta sumber pustaka)</small></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_suggestion as $key => $data_masukan)
                    <tr>
                        <td width="5px">{{ ++$i }}</td>
                        <td width="250px">{{ $data_masukan->criteria->name }}</td>
                        <td width="550px">{{ $data_masukan->criteria->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
