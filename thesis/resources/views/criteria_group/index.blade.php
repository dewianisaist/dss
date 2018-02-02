@extends('layouts.master_admin')

@section('sidebar_menu')
	@include('layouts.sidebar')
@endsection
   
@section('content_header')
<h1>
  Hierarki (Kelompok Kriteria)
  <dfn><small>Control panel</small></dfn>
</h1>
<ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Hierarki (Kelompok Kriteria)</li>
</ol>
@endsection

@section('content')
<div class="box">
	<div class="box-body">
		<div class="alert alert-warning alert-dismissible">
			<h4><i class="icon fa fa-warning"></i> Peringatan!</h4>
			<ul>
				<li><strong>Kelompok kriteria minimal harus terdiri dari tiga kriteria</strong>, jika kurang dari itu maka tidak perlu dikelompokkan.</li>
				<li><strong>Langkah</strong> untuk membuat hierarki (kelompok kriteria)</li>
				<ul>
					<li><strong>Buat kelompok kriteria</strong> dengan cara klik tombol <strong>"Tambahkan Kelompok"</strong></li>
					<li><strong>Tentukan kriteria</strong> mana saja yang termasuk dalam kelompok kriteria tersebut, 
						dengan klik tombol <strong>"Edit"</strong>, kemudian <strong>masukkan nama kelompok</strong> yang sesuai</li>
					<li>Jika terdapat <strong>kesalahan dalam penulisan</strong> kelompok kriteria maka klik tombol <strong>"Delete"</strong> 
						kelompok kriteria tersebut kemudian buat ulang dengan klik tombol <strong>"Tambahkan Kelompok"</strong></li>
				</ul>
			</ul>
		</div>
		
		@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@endif

		<div class="row">
			<div class="col-lg-12 margin-tb">
				<div class="pull-right mb-1">
					{{--  @permission('criteriagroup-create')  --}}
					<a class="btn btn-success" href="{{ route('criteriagroup.create') }}"> Tambahkan Kelompok</a>
					{{--  @endpermission  --}}
				</div>
			</div>
		</div>
	
		<br/>
    	<table id="criteriagroup" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Kriteria</th>
					<th>Penjelasan Kriteria</th>
					<th>Kelompok Kriteria</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($criteria_group as $key => $kelompok_kriteria)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $kelompok_kriteria->name }}</td>
						<td>
							@if(isset($kelompok_kriteria->description))
								{{ $kelompok_kriteria->description }} 
							@else
								<h4><span class="label label-info">Kelompok Kriteria</span></h4>
							@endif
						</td>
						<td>{{ $kelompok_kriteria->group_criteria }}</td>
						<td>
							@if(isset($kelompok_kriteria->description))
								{{--  @permission('criteriagroup-edit')  --}}
								<a class="btn btn-primary" href="{{ route('criteriagroup.edit',$kelompok_kriteria->id) }}">Edit</a>
								{{--  @endpermission  --}}
							@else
								{{--  @permission('criteriagroup-delete')  --}}
								{!! Form::open(['method' => 'DELETE','route' => ['criteriagroup.destroy', $kelompok_kriteria->id],'style'=>'display:inline']) !!}
								{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
								{!! Form::close() !!}
								{{--  @endpermission  --}}
							@endif
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{!! $criteria_group->render() !!}
	</div>
</div>	
@endsection