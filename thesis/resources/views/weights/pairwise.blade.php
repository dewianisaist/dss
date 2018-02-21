@extends('layouts.master_admin')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
  
@section('content_header')
<h1>
  Perbandingan Berpasangan
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('weight.index') }}"><i class="fa fa-balance-scale"></i> Bobot</a></li>
  <li class="active">Perbandingan Berpasangan</li>
</ol>
@endsection

@section('content')

@endsection