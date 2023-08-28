<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Presensi Digma</title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('images/icon-digma.png') }}" rel="icon">
    <link href="{{ asset('images/icon-digma.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/frontend/assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: FlexStart - v1.10.1
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <style>
        .text-biru {
            color: #1863a4;
            font-family: 'Nunito', sans-serif;
        }

        .btn-biru {
            background: #1e4bb5;
            color: white;
            font-family: 'Nunito', sans-serif;
            /* transition: 0.3s; */
        }

        .btn-biru:hover {
            font-family: 'Nunito', sans-serif;
            color: white;
            background: #123b9b;
            border: 1px solid #123b9b;
        }
    </style>

    @include('layouts.partials.member.header')
    <br><br>

    <div style="margin-bottom: 80px;">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <center>
                    <h4 class="text-biru mt-4 mb-4"><b> Daftar dan Mulai Gunakan Aplikasi Presensi Digma Sekarang </b></h4>
                </center>
                <div class="col-sm-6">
                    <form action="{{ route('auth.register') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Kuota Personalia</label>
                            <input type="number" id="showPeriode" class="form-control @error('kuota') is-invalid @enderror"
                                name="kuota" placeholder="" onchange="periode()">
                            @error('kuota')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
    
                        </div>
                        <select name="" id="selectRemove" class="form-select">
                            <option value="">- Periode Pembayaran -</option>
                            <option value="">1 Bulan - 0</option>
                            <option value="">6 Bulan - 0</option>
                            <option value="">12 Bulan - 0</option>
                        </select>
    
                        <div id="selectPeriode"></div>
                        <div class="form-group mb-1">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" id="email" name="email" placeholder="Email address">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-1">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" id="name" name="name" placeholder="your name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-1">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                id="password" placeholder="Password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-1">
                            <input type="password" class="form-control @error('confirm-password') is-invalid @enderror"
                                name="confirm-password" id="confirm-password" placeholder="Konfirmasi Password">
                            @error('confirm-password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
    
    
                        <center>
                            <h4 class="text-biru mt-4 mb-4"><b> Data Perusahaan </b></h4>
                        </center>
    
                        <div class="form-group mb-3">
                            <input type="text" class="form-control @error('perusahaan') is-invalid @enderror"
                                name="perusahaan" placeholder="Nama Perusahaan" required>
                            @error('perusahaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
    
                        <div class="form-group mb-3">
                            <select class="form-select" name="bidang_usaha" aria-label="Default select example">
                                <option value="">Pilih Bidang Usaha</option>
                                <option value="Asuransi">Asuransi</option>
                                <option value="Barang Hasil Kerajinan">Barang Hasil Kerajinan</option>
                                <option value="Peternakan">Hewan Peliharaan dan Peternakan</option>
                                <option value="Pendidikan">Pendidikan dan Pelatihan</option>
                                <option value="Lembaga Sosial">Lembaga Sosial</option>
                                <option value="Konsultan">Konsultan</option>
                                <option value="Klinik dan Rumah Sakit">Klinik dan Rumah Sakit</option>
                                <option value="Pesantren">Pesantren</option>
                                <option value="Koperasi">Koperasi</option>
                                <option value="Industri Pengolahan Pangan">Industri Pengolahan Pangan</option>
                            </select>
                        </div>
    
                        <div class="form-group mb-3">
                            <textarea class="form-control" name="alamat" placeholder="Alamat" id="floatingTextarea"></textarea>
                        </div>
    
                        <div class="form-group mb-3">
                            <input type="text" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos"
                                placeholder="Kode Pos" required>
                            @error('kode_pos')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
    
                        <div class="form-group mb-3">
                            <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon"
                                placeholder="No Telepon" required>
                            @error('no_telepon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
    
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                    </form>
                </div>
            </div>
    
    
        </div>
    
        <script>
            function periode() {
                var showPeriode = document.getElementById('showPeriode').value;
                console.log(showPeriode);
                var html = '';
                var sebulan = 10000;
                var enambulan = 9000;
                var duabelasbulan = 8000;
                totalsebulan = 1 * sebulan * showPeriode;
                totalenambulan = 6 * enambulan * showPeriode;
                totalduabelasbulan = 12 * duabelasbulan * showPeriode;
                let totalOutputSebulan = totalsebulan.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                let totalOutputEnambulan = totalenambulan.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                let totalOutputDuabelasbulan = totalduabelasbulan.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    
                html += `
                <select name="bulan" id="" class="form-select">
                    <option value="1">1 Bulan - Rp. ` + totalOutputSebulan + `</option>
                    <option value="6">6 Bulan - Rp. ` + totalOutputEnambulan + `</option>
                    <option value="12">12 Bulan - Rp. ` + totalOutputDuabelasbulan + `</option>
                    </select>`;
                var selectPeriode = document.getElementById('selectPeriode').innerHTML = html;
                var selectRemove = document.getElementById('selectRemove').remove();
           }
    </script>
    
    </div>

    @include('layouts.partials.member.footer')


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/frontend/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendor/php-email-form/validate.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"
        integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/frontend/assets/js/main.js') }}"></script>

</body>

</html>


    <br><br><br><br>
