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
                    <th>Penjelasan Kriteria <small>(beserta sumber pustaka)</small></th>
                    <th>Kesesuaian (%)</th>
                    <th>Jumlah Sesuai dari Keseluruhan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($percentages as $key => $percentage)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $percentage->name }}</td>
                        <td>{{ $percentage->description }}</td>
                        <td>{{ $percentage->result }}</td>
                        <td>{{ $percentage->sum }} dari {{ $percentage->count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $percentages->render() !!}

        <h3>Masukan</h3>
        <table id="table_resultstep1_suggestion" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria</th>
                    <th>Penjelasan Kriteria <small>(beserta sumber pustaka)</small></th>
                    <th>Pengusul</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_suggestion as $key => $data_masukan)
                    <tr>
                        <td>{{ ++$j }}</td>
                        <td>{{ $data_masukan->criteria->name }}</td>
                        <td>{{ $data_masukan->criteria->description }}</td>
                        <td>{{ $data_masukan->user->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $data_suggestion->render() !!}
    </div>
</div>
@endsection
