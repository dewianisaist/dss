<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.0-alpha.4
 * @link http://coreui.io
 * Copyright (c) 2017 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Sistem Seleksi Peserta Pelatihan</title>

    <!-- Icons -->
    <link href={{ asset('user_theme/assets/font-awesome/css/font-awesome.min.css') }} rel="stylesheet">
    <link href={{ asset('admin_theme/css/simple-line-icons.css') }} rel="stylesheet">

    <!-- Main styles for this application -->
    <link href={{ asset('admin_theme/css/style-user.css') }} rel="stylesheet">

</head>

<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mx-2">
                    <div class="card-block p-2">
                        <h1>Register</h1>
                        <p class="text-muted">Create your account</p>
                        <div class="input-group mb-1">
                            <span class="input-group-addon"><i class="icon-user"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Username">
                        </div>

                        <div class="input-group mb-1">
                            <span class="input-group-addon">@</span>
                            <input type="text" class="form-control" placeholder="Email">
                        </div>

                        <div class="input-group mb-1">
                            <span class="input-group-addon"><i class="icon-lock"></i>
                            </span>
                            <input type="password" class="form-control" placeholder="Password">
                        </div>

                        <div class="input-group mb-2">
                            <span class="input-group-addon"><i class="icon-lock"></i>
                            </span>
                            <input type="password" class="form-control" placeholder="Repeat password">
                        </div>

                        <button type="button" class="btn btn-block btn-success">Create Account</button>
                    </div>
                    <div class="card-footer p-2">
                        <div class="row">
                            <div class="col-10"> Anda sudah punya akun? 
                                <a class="btn btn-link px-0" href="/user/login">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and necessary plugins -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/tether/dist/js/tether.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


</body>

</html>