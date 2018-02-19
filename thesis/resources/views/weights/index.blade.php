@extends('layouts.master_admin')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
  
@section('content_header')
<h1>
   Bobot
</h1>
<ol class="breadcrumb">
    <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Bobot</li>
</ol>
@endsection

@section('content')
<div class="box">
    <div class="box-body">
        <div class="alert alert-warning alert-dismissible">
            <h4><i class="icon fa fa-warning"></i> Peringatan!</h4>
            <ul>
                <li>Silahkan isi <strong>semua pairwise comparison</strong> terlebih dahulu, klik button AHP.</li>
            </ul>
        </div>
        
        <table id="table_questionnaire_standart" class="table">
            <thead>
                <tr>
                    <th>Tujuan</th>
                    <th>Kriteria</th>
                    <th>Sub-Kriteria</th>
                    <th>Bobot Global</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        SPK Seleksi Peserta Pelatihan 
                        <a class="btn btn-success" href="{{ route('weights.create') }}"> AHP</a>
                    </td>
                </tr>
                @foreach ($criterias_group as $id => $value)
                <tr>
                        <td></td>
                        <td>
                            {{ $value["name"] }}
                            <span class="label label-primary">xxx</span>
                            <a class="btn btn-success" href="{{ route('weights.create') }}"> AHP</a>
                        </td>
                </tr>
                @foreach($value["data"] as $crit)
					<tr>
                        <td></td>
                        <td></td>
						<td>
                            {{ $crit->name }}
                            <span class="label label-primary">xxx</span>
                        </td>
					</tr>
                 @endforeach
			@endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
