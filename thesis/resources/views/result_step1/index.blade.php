@extends('layouts.master_admin')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
  
@section('content_header')
<h1>
    Hasil Kriteria Tahap 1
</h1>
<ol class="breadcrumb">
    <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Hasil Kriteria Tahap 1</li>
</ol>
@endsection

@section('content')
<div class="box">
    <div class="box-body">
        <table id="table_resultstep1_standart" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria</th>
                    <th>Penjelasan Kriteria</th>
                    <th>Sumber Pustaka</th>
                    <th>Kesesuaian (%)</th>
                    <th>Jumlah Sesuai dari Keseluruhan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($percentages as $key => $percentage)
                    <tr>
                        <td width="5px">{{ ++$i }}</td>
                        <td width="175px">{{ $percentage->name }}</td>
                        <td width="450px">{{ $percentage->description }}</td>
                        <td width="250px">{{ $percentage->citation }}</td>
                        <td width="120px">{{ $percentage->result }}</td>
                        <td>{{ $percentage->sum }} dari {{ $percentage->count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Masukan</h3>
        <table id="table_resultstep1_suggestion" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria</th>
                    <th>Penjelasan Kriteria</th>
                    <th>Pengusul</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_suggestion as $key => $data_masukan)
                    <tr>
                        <td width="5px">{{ ++$j }}</td>
                        <td width="175px">{{ $data_masukan->name }}</td>
                        <td width="700px">{{ $data_masukan->description }}</td>
                        <td>{{ $data_masukan->user_name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
