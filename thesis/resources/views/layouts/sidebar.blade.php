{{--  Only staf can see "Data Pengguna"  --}}
@if(Auth::user()->roleId() == 1)
<li {{ substr( \Request::route()->getName(), 0, 6 ) == 'users.' ? 'class=active' : '' }}>
    <a href="{{ route('users.index') }}"><i class="fa fa-users"></i> <span>Data Pengguna</span></a>
</li>
@endif

{{--  Only staf can see "Data Role"  --}}
@if(Auth::user()->roleId() == 1)
<li {{ substr( \Request::route()->getName(), 0, 6 ) == 'roles.' ? 'class=active' : '' }}>
    <a href="{{ route('roles.index') }}"><i class="fa fa-key"></i>  <span>Data <dfn>Role</dfn></span></a>
</li>
@endif

{{--  Only staf can see "Program (Kejuruan and Sub-Kejuran)"  --}}
@if(Auth::user()->roleId() == 1)
<li {{ substr( \Request::route()->getName(), 0, 12 ) == 'vocationals.' ? 'class=active treeview menu-open' : '' }}>
  <a href="{{ route('vocationals.index') }}">
    <i class="fa fa-industry"></i>
    <span>Program</span>
  	<span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li {{ substr( \Request::route()->getName(), 0, 12 ) == 'vocationals.' ? 'class=active' : '' }}>
      <a href="{{ route('vocationals.index') }}"><i class="fa fa-industry"></i> Kejuruan</a>
    </li>
    <li {{ substr( \Request::route()->getName(), 0, 15 ) == 'subvocationals.' ? 'class=active' : '' }}>
      <a href="{{ route('subvocationals.index') }}"><i class="fa fa-industry"></i> Sub-Kejuruan</a>
    </li>
  </ul>
</li>
@endif

{{--  Only staf can see "Pendidikan"  --}}
@if(Auth::user()->roleId() == 1)
<li {{ substr( \Request::route()->getName(), 0, 11 ) == 'educations.' ? 'class=active' : '' }}>
    <a href="{{ route('educations.index') }}"><i class="fa fa-graduation-cap"></i>  <span>Pendidikan</span></a>
</li>
@endif

{{--  Only staf can see "Kursus"  --}}
@if(Auth::user()->roleId() == 1)
<li {{ substr( \Request::route()->getName(), 0, 8 ) == 'courses.' ? 'class=active' : '' }}>
    <a href="{{ route('courses.index') }}"><i class="fa fa-university"></i>  <span>Kursus</span></a>
</li>
@endif

{{--  All user except pendaftar can see "Jadwal Seleksi"  --}}
@if(Auth::user()->roleId() != 2)
<li {{ substr( \Request::route()->getName(), 0, 19 ) == 'selectionschedules.' ? 'class=active' : '' }}>
  <a href="{{ route('selectionschedules.index') }}"><i class="fa fa-calendar-o"></i>  <span>Jadwal Seleksi</span></a>
</li>
@endif

{{--  Kajur, kepala, koor. instruktur can see "Nilai Seleksi"  --}}
@if(Auth::user()->roleId() == 3 || Auth::user()->roleId() == 5 || Auth::user()->roleId() == 6)
<li {{ substr( \Request::route()->getName(), 0, 11 ) == 'selections.' ? 'class=active' : '' }}>
  <a href="{{ route('selections.index') }}"><i class="fa fa-balance-scale"></i>  <span>Nilai Seleksi</span></a>
</li>
@endif

{{--  All user except pendaftar can see "Jadwal Seleksi Pendaftar"  --}}
@if(Auth::user()->roleId() != 2)
<li {{ substr( \Request::route()->getName(), 0, 21 ) == 'selectionregistrants.' ? 'class=active' : '' }}>
  <a href="{{ route('selectionregistrants.index') }}"><i class="fa fa-calendar-check-o"></i>  <span>Jadwal Seleksi Pendaftar</span></a>
</li>
@endif

{{--  All user except pendaftar can see "Data Pendaftar"  --}}
@if(Auth::user()->roleId() != 2)
<li {{ substr( \Request::route()->getName(), 0, 19 ) == 'manage_registrants.' ? 'class=active' : '' }}>
  <a href="manage_registrants.index"><i class="fa fa-users"></i> <span>Data Pendaftar</span></a>
</li>
@endif

<li class="treeview">
  <a href="">
    <i class="fa fa-list"></i>
    <span>Kriteria</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{ route('criterias.index') }}"><i class="fa fa-list"></i> Kriteria dari Kajian Pustaka</a></li>
    <li><a href=""><i class="fa fa-list"></i> Kuesioner</a></li>
    <li><a href=""><i class="fa fa-list"></i> Hasil Kriteria Tahap 1</a></li>
    <li><a href=""><i class="fa fa-list"></i> Kriteria Tahap 2</a></li>
    <li><a href=""><i class="fa fa-list"></i> Level Hierarki</a></li>
    <li><a href=""><i class="fa fa-list"></i> Sistem Hierarki</a></li>
  </ul>
</li>

{{--  Only kepala can see "Bobot/Pairwise Comparison"  --}}
@if(Auth::user()->roleId() == 3)
<li {{ substr( \Request::route()->getName(), 0, 8 ) == 'courses.' ? 'class=active' : '' }}>
  <a href=""><i class="fa fa-balance-scale"></i>  <span>Bobot</span></a>
</li>
@endif

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