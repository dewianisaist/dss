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
        
        <table id="table_questionnaire_test" class="table">
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
                        <td rowspan = '5'>
                            SPK Seleksi Peserta Pelatihan 
                            <a class="btn btn-success"> AHP</a>
                        </td>
                        <tr rowspan = '1'>
                            <td>1</td>
                        </tr>
                        <tr rowspan = '1'>
                            <td>1</td>
                        </tr>
                        <tr rowspan = '3'>
                             <td>1</td>
                             <tr>
                                 <td>2</td>
                             </tr>
                             <tr>
                                    <td>2</td>
                                </tr>
                                <tr>
                                        <td>2</td>
                                    </tr>
                        </tr>
                    </tr>
                </tbody>
            </table>

        {{--  <table id="table_questionnaire_standart" class="table">
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
                    <td rowspan = "{{ $criterias_group['rowspan'] }}">
                        SPK Seleksi Peserta Pelatihan 
                        <a class="btn btn-success" href="{{ route('weights.create') }}"> AHP</a>
                    </td>
                </tr>
                @foreach ($criterias_group as $value)
                <tr>
                    <td rowspan = "{{ $value['member'] }}">
                        {{ $value["group"]["name"] }}
                        <span class="label label-primary">xxx</span>
                        <a class="btn btn-success" href="{{ route('weights.create') }}"> AHP</a>
                    </td>
                </tr>
                @if (count($value["data"]) > 0)
                @foreach ($value["data"] as $crit)
					<tr>
						<td>
                            {{ $crit->name }}
                            <span class="label label-primary">xxx</span>
                        </td>
					</tr>
                 @endforeach
                 @else
                    <tr>
						<td>
                            
                        </td>
					</tr>
                 @endif
			@endforeach
            </tbody>
        </table>  --}}
    </div>
</div>
@endsection
