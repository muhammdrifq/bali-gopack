@extends('layouts.admin')
@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white pb-2 fw-bold">Module</h1>
                    <h3 class="text-white op-7 mb-2">Module ini adalah module yang dapat dipakai di halaman ataupun mengatur
                        halaman</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-inner mt--5">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <a href="/admin/artikel" style="text-decoration: none">
                    <div class="card card-stats card-round d-block bg-info-gradient">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center text-white">
                                        <i class="fa-solid fa-newspaper"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <h1 class="card-title text-white">Artikel</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="/admin/slide" style="text-decoration: none">
                    <div class="card card-stats card-round d-block bg-info-gradient">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center text-white">
                                        <i class="fa-solid fa-clone"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers ">
                                        <h1 class="card-title text-white">Slide</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="/admin/galeri" style="text-decoration: none">
                    <div class="card card-stats card-round d-block bg-info-gradient">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center text-white">
                                        <i class="fa-regular fa-images"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <h1 class="card-title text-white">Galeri</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="/admin/kontak" style="text-decoration: none">
                    <div class="card card-stats card-round d-block bg-info-gradient">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center text-white">
                                        <i class="fa-solid fa-address-book"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <h1 class="card-title text-white">Kontak</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="/admin/tentang" style="text-decoration: none">
                    <div class="card card-stats card-round d-block bg-info-gradient">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="icon-big text-center text-white">
                                        <i class="fa-solid fa-info"></i>
                                    </div>
                                </div>
                                <div class="col-8 col-stats">
                                    <div class="numbers">
                                        <h1 class="card-title text-white">Tentang Icommits</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="/admin/keuntungan" style="text-decoration: none">
                    <div class="card card-stats card-round d-block bg-info-gradient">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <div class="icon-big text-center text-white">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                </div>
                                <div class="col-9 col-stats">
                                    <div class="numbers">
                                        <h1 class="card-title text-white">Keuntungan Berlangganan</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="/admin/pertanyaan" style="text-decoration: none">
                    <div class="card card-stats card-round d-block bg-info-gradient">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center text-white">
                                        <i class="fa-solid fa-question"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <h1 class="card-title text-white">Pertanyaan</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="/admin/produk" style="text-decoration: none">
                    <div class="card card-stats card-round d-block bg-info-gradient">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center text-white">
                                        <i class="fa-solid fa-cube"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <h1 class="card-title text-white">Produk</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="/admin/testimoni" style="text-decoration: none">
                    <div class="card card-stats card-round d-block bg-info-gradient">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center text-white">
                                        <i class="fa-solid fa-comments"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <h1 class="card-title text-white">Testimoni</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="/admin/perusahaan" style="text-decoration: none">
                    <div class="card card-stats card-round d-block bg-info-gradient">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center text-white">
                                        <i class="fa-solid fa-handshake"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <h1 class="card-title text-white">Perusahaan</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                
            </div>
            {{-- <div class="col-sm-6 col-md-3">
                <a href="/admin/header-setting" style="text-decoration: none">
                    <div class="card card-stats card-round d-block bg-info-gradient">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center text-white">
                                        <i class="fa-solid fa-heading"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <h1 class="card-title text-white">Header Setting</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                
            </div> --}}
        </div>
    </div>
    
@endsection
