@extends('layouts.master_admin')

@section('sidebar_menu')
<li class="active"><a href="manage_registrants.index"><i class="fa fa-users"></i> <span>Data Pendaftar</span></a></li>
<li class="treeview">
  <a href="">
    <i class="fa fa-list"></i>
    <span>Kriteria</span>
  	<span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href=""><i class="fa fa-list"></i> Kuesioner</a></li>
		<li><a href=""><i class="fa fa-list"></i> Hasil Kriteria Tahap 1</a></li>
		<li><a href=""><i class="fa fa-list"></i> Kriteria Tahap 2</a></li>
		<li><a href=""><i class="fa fa-list"></i> Level Hierarki</a></li>
		<li><a href=""><i class="fa fa-list"></i> Sistem Hierarki</a></li>
  </ul>
</li>
<li><a href=""><i class="fa fa-balance-scale"></i>  <span>Bobot</span></a></li>
<li class="treeview">
  <a href="{{ route('preferences.index') }}">
    <i class="fa fa-hourglass-half"></i>
    <span>Penilaian</span>
  	<span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
		<li><a href="{{ route('preferences.index') }}"><i class="fa fa-hourglass-half"></i> Tipe Preferensi</a></li>
		<li><a href=""><i class="fa fa-hourglass-half"></i> Hasil</a></li>
  </ul>
</li>
@endsection

@section('content_header')
<h1>
  Data Pendaftar
  <dfn><small>Control panel</small></dfn>
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Data Pendaftar</li>
</ol>
@endsection

@section('content')

@endsection
