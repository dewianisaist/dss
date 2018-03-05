@extends('layouts.master_admin')

@section('css')
<style type="text/css"> 
    .checkbox label, .radio label{padding-left: 35px };} 
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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

        @if ($message = Session::get('failed'))
			<div class="alert alert-error">
				<p>{{ $message }}</p>
			</div>
        @endif
        
        {!! Form::open(array('route' => 'questionnaire.store','method'=>'POST')) !!}
            <table id="table_questionnaire" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kriteria</th>
                        <th>Penjelasan Kriteria</th>
                        <th>Sumber Pustaka</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($criteria as $key => $questionnaire)
                        <tr>
                            <td width="5px">{{ ++$i }}</td>
                            <td width="200px">{{ $questionnaire->name }}</td>
                            <td width="450px">{!! nl2br(e($questionnaire->description)) !!}</td>
                            <td width="250px">{!! nl2br(e($questionnaire->citation)) !!}</td>
                            <td>
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

            <h3>Masukan</h3>
            <p>Isikan kriteria tambahan beserta keterangannya yang sesuai dengan proses seleksi peserta pelatihan BLK Bantul.</p>
            <div class="input-group control-group after-add-more">
                <div class="col-xs-5">
                    <input type="text" name="criteriamore[]" class="form-control" placeholder="Kriteria">
                </div>
                <div class="col-xs-7">
                    <input type="text" name="descriptionmore[]" class="form-control" placeholder="Penjelasan Kriteria">
                </div>
                <div class="input-group-btn"> 
                    <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
                </div>        
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <br/>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        {!! Form::close() !!}

        <!-- Copy Fields -->
        <div class="copy hide">
            <div class="control-group input-group" style="margin-top:10px">
                <div class="col-xs-5">
                    <input type="text" name="criteriamore[]" class="form-control" placeholder="Kriteria">
                </div>
                <div class="col-xs-7">
                    <input type="text" name="descriptionmore[]" class="form-control" placeholder="Penjelasan Kriteria">
                </div>
                <div class="input-group-btn"> 
                    <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Hapus </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>
@endsection