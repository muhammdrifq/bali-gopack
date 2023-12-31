<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin Presensi</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link href="{{ asset('images/icon-belajar.png') }}" rel="icon">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/admin/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
                    google: {
                        "families": ["Lato:300,400,700,900"]
                    },
                    custom: {
                        "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                            "simple-line-icons"
                        ],
                        urls: ['
                            assets / admin / css / fonts.min.css ']
                        },
                        active: function() {
                            sessionStorage.fonts = true;
                        }
                    });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/atlantis.min.css') }}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/demo.css') }}">
</head>

<style>
    body {
        background: #1e4bb5;
        /* background: linear-gradient(to right, rgb(0, 0, 119), #0004df); */
    }
</style>

<body><br><br><br>



    <div class="container"><br><br>
        <center>
            <div class="card border-0 shadow bg-white col-sm-5">
                <div class="card-body">
                    <h2 class="text-center"><b> Login Admin Presensi </b></h2>
                    {{-- <h5>LOGIN ADMIN PRESENSI</h5> --}}
                    <br>
                    <form class="" action="/app/admin/login/proses" method="POST">
                        @csrf

                        <input type="text" name="email" value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        @error('email')
                            <span class="invalid-feedback" style="text-align: left; padding-left: 20px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <br>

                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password" />
                        @error('password')
                            <span class="invalid-feedback" style="text-align: left; padding-left: 20px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror


                        <div class="mt-3">
                            <button class="btn btn-primary btn-block" type="submit">Login</button>
                        </div>
                        <div
                            class="
                           my-2
                           d-flex
                           justify-content-between
                           align-items-center
                         ">
                        </div>
                    </form>
                </div>
            </div>
        </center>
    </div>


    <style>
        hr {
            width: 70%
        }
    </style>












    <center>
        {{-- <img src="{{ asset('images/LOGO-DAMKAR.png') }}" width="100" alt="Logo Damkar"> --}}
        <br><br>

        {{-- <style>
            .form-control col-sm-12 {
                padding: 11px;
                width: 400px;
                border: 0;
                background: rgb(238, 238, 238);
                border-radius: 20px;
                padding-left: 30px;
            }

            button {
                width: 400px;
                border: 0;
                background: #4154f1;
                padding: 11px;
                color: white;
                border-radius: 23px;
                cursor: pointer;
                font-size: 17px;
            }

            button:hover {
                background: rgb(28, 28, 255);
                transition: 0.3s;
            }

            .form-control col-sm-12:focus {
                background: white;
                border: 2px solid #4154f1;
            }

            h3 {
                padding-right: 290px;
                margin-top: 20px;
            }
        </style> --}}







    </center>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/admin/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('assets/admin/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets/admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>


    <!-- Chart JS -->
    <script src="{{ asset('assets/admin/js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('assets/admin/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('assets/admin/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('assets/admin/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    {{-- <script src="{{ asset('assets/admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script> --}}

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('assets/admin/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('assets/admin/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Atlantis JS -->
    <script src="{{ asset('assets/admin/js/atlantis.min.js') }}"></script>

    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="{{ asset('assets/admin/js/setting-demo.js') }}"></script>
    <script src="{{ asset('assets/admin/js/demo.js') }}"></script>
</body>

</html>
