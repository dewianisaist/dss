<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Sistem Seleksi Peserta Pelatihan</title>

    <!-- Icons -->
    <link href={{ asset('admin_theme/css/font-awesome.min.css') }} rel="stylesheet">
    <link href={{ asset('admin_theme/css/simple-line-icons.css') }} rel="stylesheet">

    <!-- Main styles for this application -->
    <link href={{ asset('admin_theme/css/style.css') }} rel="stylesheet">

</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler hidden-lg-up" type="button">&#9776;</button>
        <a class="navbar-brand" href="#"></a>
        {{--  <ul class="nav navbar-nav hidden-md-down">
            <li class="nav-item">
                <a class="nav-link navbar-toggler sidebar-toggler" href="#">&#9776;</a>
            </li>
        </ul>  --}}

        <ul class="nav navbar-nav ml-auto mr-2">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="hidden-md-down"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Ubah Password</a>
                    <a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-lock"></i> Logout</a>
                </div>
            </li>

        </ul>
    </header>

    <div class="app-body">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}"><i class="icon-info"></i> Tujuan Sistem</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}"><i class="icon-people"></i> Data Pengguna</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('roles.index') }}"><i class="icon-key"></i> Data <dfn>Roles</dfn></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('itemCRUD2.index') }}"><i class="fa fa-user"></i> Item</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vocationals.index') }}"><i class="icon-wrench"></i> Kejuruan</span></a>
                    </li>
                </ul>
            </nav>
        </div>
    

        <!-- Main content -->
        <main class="main">
            <div class="container mt-2 mb-2">
                @yield('content')
            </div>
        </main>
    </div>

    <footer class="app-footer">
        <span> &copy; 2017 Dewi Anisa Istiqomah</span>
        <span class="float-right">Magister Ilmu Komputer Universitas Gadjah Mada</span>
    </footer>
    
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
