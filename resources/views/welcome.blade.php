@extends('layouts.member')

@section('js')
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
@endsection

@section('content')
    @php
        use Illuminate\Support\Facades\Http;
        use App\Models\Tb_tentang;
        use App\Models\Tb_keuntungan;
        use App\Models\Tb_pertanyan;
        use App\Models\Tb_perusahaan;
        use App\Models\Tb_testimoni;
        use App\Models\Produk;
        
        $tentang = Tb_tentang::find(1);
        $keuntungan = Tb_keuntungan::find(1);
        $pertanyaan = Tb_pertanyan::all();
        $produk = Produk::all();
        $testimoni = Tb_testimoni::all();
        $perusahaan = Tb_perusahaan::all();
        // dd(session('user'));
        $user = session('user');
    @endphp
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    
                    <h1 data-aos="fade-up"><strong>
                            Bali Gopack Mandiri Jasa Packing Barang. Aman & Terpercaya
                        </strong>
                    </h1>
                    <span class="mt-2" data-aos="fade-right" data-aos-delay="200" style="font-family: 'Nunito', sans-serif;">
                        Bali Gopack Mandiri menawarkan jasa untuk pengepakan barang yang anda ingin kirim. Jasa packing yang
                        ditawarkan berupa bubble wrap, packing kayu, packing kardus, dan lainnya yang bisa anda pilih.
                    </span>
                    {{-- <h2 data-aos="fade-up" data-aos-delay="400">Belajar berkarya dan berprestasi bersama!</h2> --}}
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            {{-- <a href="{{ route('auth.register') }}"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Daftar Sekarang</span>
                                <i class="bi bi-arrow-right"></i>
                            </a><br> --}}
                            <a href="#values" class="btn-get-started scrollto d-inline-flex"
                                style="background: white; color: #1f3dc1">
                                <span class="p-1">Pelajari</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_gi35awDTg4.json"  background="transparent"  speed="1"  style="width: 500px; height: 500px;"  loop  autoplay></lottie-player>                </div>
            </div>
        </div>

    </section><!-- End Hero -->


    <main id="main">
        <section id="values" class="values">

            <div class="container mt-4" data-aos="fade-up">

                <center>
                    <h2 class="text-biru">
                        <b> Jasa Packing Barang di Bali Gopack Mandiri </b>
                    </h2>
                    <span style="font-family: 'Nunito', sans-serif;">
                        Layanan packing di <b>Bali Gopack Mandiri</b> mempunyai beberapa jenis yang bisa anda pilih sesuai kebutuhan sebagai berikut.
                    </span>
                </center>

                <div class="row mt-4">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="box">
                            <img src="{{ asset('images/packing/packing-kayu.png') }}" class="" style="width: 300px;"
                                alt="">
                            <h3>Packing Kayu</h3>
                            <p>Komponen packing terluar untuk menjaga barang anda yang rentan pecah seperti barang elektronik, kaca, dan sebagainya.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                        <div class="box">
                            <img src="{{ asset('images/packing/kardus.png') }}" class="" style="width: 300px;" alt="">
                            <h3>Packing Kardus</h3>
                            <p>Komponen packing untuk mengirim barang dalam kuantitas banyak.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                        <div class="box">
                            <img src="{{ asset('images/packing/bubble-wrap.jpg') }}" class="" style="width: 300px;"
                                alt="">
                            <h3>Bubble Wrap</h3>
                            <p>Berbahan dasar plastik berbentuk gelembung untuk meredam benturan dan guncangan selama pengiriman.</p>
                        </div>
                    </div>

                </div>
                <div class="row mt-4">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="box">
                            <img src="{{ asset('images/packing/packing-amplop.png') }}" class="" style="width: 200px;"
                                alt="">
                            <h3>Packing Amplop</h3>
                            <p>Cocok untuk pengiriman barang berupa berkas, dokumen, atau surat-surat penting. Material yang dipakai 
                                tidak mudah sobek untuk proteksi berkas yang dikirim.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                        <div class="box">
                            <img src="{{ asset('images/packing/packing-karung.png') }}" class="" style="width: 200px;" alt="">
                            <h3>Packing Karung</h3>
                            <p>Komponen packing yang cocok untuk mengirim barang yang memerlukan sirlukasi udara yang baik.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                        <div class="box">
                            <img src="{{ asset('images/packing/packing-plastik.png') }}" class="" style="width: 200px;"
                                alt="">
                            <h3>Packing Plastik</h3>
                            <p>Komponen yang melindungi barang dari goresan dan air selama pengiriman. Biasanya plastik ini disertakan dengan
                                packing Bubble Wrap.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
            <br>
            <div class=" mt-4" style="background: #1f3dc1;">
                <br>
                <center>
                    <h2 class="text-white mb-5" style="margin-top: 20px;" data-aos="fade-up">
                        Mengapa Harus Menggunakan layanan dari<b>  Bali Gopack Mandiri? </b>
                    </h2>
                </center>
                <div class="container">
                    <div class="row">
                        <div class="col-sm mb-3">
                            <div class="card border-0 rounded shadow" data-aos="fade-up" data-aos-delay="300">
                                <div class="card-body">
                                    <h5><b> Fleksibilitas dalam Pemilihan Jenis Packing </b></h5>
                                    Dengan menggunakan layanan dari <b>Bali Gopack Mandiri</b>, Anda dapat menentukan jenis packing apa yang anda butuhkan.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm mb-3">
                            <div class="card border-0 rounded shadow" data-aos="fade-up" data-aos-delay="600">
                                <div class="card-body">
                                    <h5><b> Melayani Berbagai Macam Jenis Pengepakan </b></h5>
                                    Kami Melayani berbagai jenis pengepakan, dari mulai sekala kecil sampai sekala besar.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm mb-3">
                            <div class="card border-0 rounded shadow" data-aos="fade-up" data-aos-delay="300">
                                <div class="card-body">
                                    <h5><b> Paket Pasti Aman </b></h5>
                                    Lebih aman dan higienis! tidak perlu lagi khawatir dengan paket anda, Paket anda akan aman sampai tujuan dengan 
                                    layanan packing kami.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm mb-3">
                            <div class="card border-0 rounded shadow" data-aos="fade-up" data-aos-delay="600">
                                <div class="card-body">
                                    <h5><b>Proses Packing Cepat</b></h5>
                                    Tidak perlu tunggu berhari-hari untuk dipacking, dengan <b>Bali Gopack Mandiri</b>, proses packing nya cepat dan tepat.
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-sm mb-3">
                            <div class="card border-0 rounded shadow" data-aos="fade-up" data-aos-delay="300">
                                <div class="card-body">
                                    <h5><b> Pengaturan Shift Kerja</b></h5>
                                    Menerapkan sistem shift kerja untuk setiap karyawan, cabang atau divisi? Tenang, Anda
                                    dapat membuat dan mengatur kehadiran semudah 'drag and drop'.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm mb-3">
                            <div class="card border-0 rounded shadow" data-aos="fade-up" data-aos-delay="600">
                                <div class="card-body">
                                    <h5><b> Integrasi dengan Gadjian</b></h5>
                                    Penggajian jadi mudah. Anda cukup mengimpor rekap absensi karyawan dari Hadirr ke
                                    Gadjian dan gaji karyawan pun terhitung secara otomatis (hanya tersedia di Indonesia)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm mb-3">
                            <div class="card border-0 rounded shadow" data-aos="fade-up" data-aos-delay="300">
                                <div class="card-body">
                                    <h5><b> Riwayat Aktivitas (Activity Log)</b></h5>
                                    Karyawan bisa akses data absensi, kunjungan klien, dan reimbursement melalui handphone.
                                    Admin pun dapat berkolaborasi dan berbagi peran.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm mb-3">
                            <div class="card border-0 rounded shadow" data-aos="fade-up" data-aos-delay="600">
                                <div class="card-body">
                                    <h5><b>OPEN API</b></h5>
                                    Hadirr dapat diintegrasikan dengan aplikasi HR (HRIS/HRMS) yang telah Anda miliki.
                                    Kelola data karyawan dan dapatkan data absensi karyawan melalui API Hadirr.
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <br>
            </div>

        </section>

        <div class="container">
            <div class="row">
                <h2 class="text-biru mb-5" style="margin-top: 20px;" data-aos="fade-up">
                    <b> Harga Jasa Packing Barang </b> Bali Gopack Mandiri
                </h2>

            </div>
            <div class="row">
                
                <p data-aos="fade-up">Di <b>Bali Gopack Mandiri</b>, Harga yang ditawarkan tergantung dengan jenis packing yang anda pilih. Selain jenis,
                berat dari barang yang dikirim pun akan menjadi salah satu faktor penentuan harga.</p>

                <p data-aos="fade-up"><b>Bali Gopack Mandiri</b> adalah pilihan tepat untuk Anda yang ingin mengirim barang, tapi bingung dengan masalah packing yang aman dan tepat. Dengan 
                menggunakan jasa kami, anda tidak perlu repot-repot lagi mengemas barang anda sendiri karena kami akan urus itu semua dengan <b>Cepat</b>, <b>Aman</b>, dan <b>Praktis</b>.
                Nah, dengan keunggulan tersebut, Harga yang ditawarkan juga sesuai kualitas, jadi sudah tidak akan ada lagi barang rusak rusak diperjalanan.</p>

            </div>
        </div>
        <div class=" mt-4" style="background: #1f3dc1;">
            <br>
           
            <div class="container">
                
                <div class="row">
                    <div class="col-sm mb-3">
                        <div style="margin-top: 10px" data-aos="fade-up" data-aos-delay="300">
                            <div style="color: #ffffff">
                                <h5><b> Jadi Tunggu Apalagi? Yuk Coba Jasa Packing dari Bali Gopack Mandiri. </b></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm mb-3">
                        <div class="card border-0 rounded shadow" data-aos="fade-up" data-aos-delay="600">
                            <div class="card-body">
                                <center>
                                    <h5>Coba Packing Bali Gopack Mandiri</h5>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <br>
        </div>


        <section id="testimonials" class="testimonials">

            <div class="container" data-aos="fade-up">

                <center>
                    <h2 class="text-biru mb-5" style="margin-top: 20px;" data-aos="fade-up">
                        <b> Testimoni Kami </b>
                    </h2>
                </center>


                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
                    <div class="swiper-wrapper">

                        @foreach ($testimoni as $item)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <p>
                                        "{{ $item->testimoni }}"
                                    </p>
                                    <div class="profile mt-auto">
                                        <img src="{{ asset('images/testimoni/gambar/'. $item->gambar)}}"
                                        class="testimonial-img" alt="">
                                        <h3>{{ $item->name}}</h3>
                                        <h4>{{ $item->instansi}}</h4>
                                    </div>
                                </div>
                            </div><!-- End testimonial item -->
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

                

            </div>

        </section>



  {{-- <section id="clients" class="clients">

    <div class="container" data-aos="fade-up">

        <center>
            <h2 class="text-biru mb-5" style="margin-top: 20px;" data-aos="fade-up">
                <b> Presensi Digma dipercaya oleh </b>
            </h2>
        </center>

        <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
                @foreach ($perusahaan as $item)
                <div class="swiper-slide"><img src="{{ asset('images/perusahaan/gambar/'. $item->gambar) }}" class=""
                    style="width: 180px;" alt=""></div>
                    
                @endforeach
                
                
                
            </div>
            <div class="swiper-pagination"></div>
        </div>

       
    </div>
    </section> --}}

        {{-- <center>
            <a href="{{ route('auth.register') }}" class="btn btn-biru btn-lg text-white" data-aos="fade-up">Daftar
                Sekarang</a>
        </center> --}}

        <!-- ======= About Section ======= -->
        {{-- <section id="about" class="about">


            <div class="container" data-aos="fade-up">


                <div class="row gx-0">

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="rounded shadow content" style="background: #0069FF;">
                            <h1 class="text-white">{{ $tentang->judul }}</h1>
                            <h2 class="text-white"> {{ $tentang->teks }}</h2>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{ $tentang->gambar() }}" class="" style="margin-left: 20px;" width="450"
                            alt="">
                    </div>

                </div>
            </div>

        </section> --}}

        <!-- ======= Features Section ======= -->
        {{-- <section id="features" class="features">

            <div class="container" data-aos="fade-up">

                <header class="section-header">

                    <p>Keuntungan Berlangganan</p>
                </header>

                <div class="row">

                    <div class="col-lg-6">
                        <img src="{{ $keuntungan->gambar() }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
                        <div class="row align-self-center gy-4">

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>{{ $keuntungan->teks1 }}</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>{{ $keuntungan->teks2 }}</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>{{ $keuntungan->teks3 }}</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Game Pembelajaran</h3>
                                    <h3>{{ $keuntungan->teks4 }}</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>{{ $keuntungan->teks5 }}</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>{{ $keuntungan->teks6 }}</h3>
                                </div>
                            </div>

                        </div>
                    </div>

                </div> 

            </div>

        </section> --}}
        <!-- End Features Section -->


        {{-- <section id="recent-blog-posts" class="recent-blog-posts">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Blog</h2>
                    <p>Produk Dan Layanan Kami</p>
                </header>

                <div class="row">
                    @foreach ($produk as $data_produk)
                        <div class="col-lg-4 mb-4">
                            <div class="post-box">
                                <div class=""><img src="{{ $data_produk->cover() }}"
                                        style="width: 100%; height: 150px; object-fit: cover;" class=""
                                        alt="">
                                </div>
                                <h3 class="post-title">{{ $data_produk->nama }}
                                </h3>
                                <div class="">{!! Str::limit($data_produk->deskripsi, 30) !!}</div>
                                <a href="/produk/{{ $data_produk->slug }}" class="readmore stretched-link mt-auto"
                                    style="margin-top: 50px;"><span>Lihat
                                        Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>

        </section> --}}

        <!-- ======= Services Section ======= -->
        {{-- <section id="services" class="services">

            <div class="container" data-aos="fade-up">

                <header class="section-header">

                    <p>Pelayanan Belajar.Link</p>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Fleksibel</h3>
                            <p>memudahkanmu dalam mengakses pembelajaran</p>
                            <a href="#" class=""></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-box orange">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Sertifikat</h3>
                            <p>Mendapatkan sertifikat resmi untuk kamu</p>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-box #31d71b">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Interaktif</h3>
                            <p>Kamu akan mendapatkan pembelajaran melalui video Interaktif,game pembelajaran yang menarik
                                dan kuis yang dapat meningkatkan pembelajaranmu.</p>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-box red">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Tutor ahli</h3>
                            <p>Kamu akan mendapatkan tutor yang ahli dibidangnya sehingga dapat meningkatkan kemampuanmu.
                            </p>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-box purple">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Tanya pembelajaran</h3>
                            <p>Kamu dapat bertanya kepada tutormu materi-materi yang tidak kamu pahami</p>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="700">
                        <div class="service-box pink">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Referensi ervariasi</h3>
                            <p>Kamu akan mendapatkan latihan soal,mendapatkan e-book, vidio pembelajaran,dan salindia
                                mengenai materi pembelajaran.</p>

                        </div>
                    </div>

                </div>

            </div>

        </section> --}}
        <!-- End Services Section -->

        <!-- ======= Pricing Section ======= -->
        {{-- <section id="pricing" class="pricing">

            <div class="container" data-aos="fade-up">

                <header class="section-header">

                    <p>Paket Pembelajaran</p>
                </header>

                <div class="row gy-4" data-aos="fade-left">

                    @foreach ($paket as $item)
                        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                            <div class="box">
                                <img src="{{ asset('images/belajar.jpeg') }}" class="img-fluid" alt="">
                                <div>
                                    <hr>
                                    <h4> <b> {{ $item->nama_paket }}</b></h3>
                                        <hr>
                                </div>
                                <h5>Keterangan:</h5>
                                <ul>
                                    <li>{!! html_entity_decode(Str::limit($item->deskripsi, 100)) !!}</li>
                                    <!-- <li>Nec feugiat nisl</li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <li>Nulla at volutpat dola</li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <li class="na">Pharetra massa</li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <li class="na">Massa ultricies mi</li> -->
                                </ul>
                                <a href="https://app.belajar.link/paket/get-free/{{ $item->id }}" class="btn-buy">Coba
                                    Gratis</a>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

        </section> --}}
        <!-- End Pricing Section -->






        {{-- <section id="recent-blog-posts" class="recent-blog-posts">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Blog</h2>
                    <p>Recent posts form our Blog</p>
                </header>

                <div class="row">

                    <div class="col-lg-3">
                        <div class="post-box">
                            <div class="post-img"><img src="{{ asset('assets/frontend/assets/img/blog/blog-1.jpg') }}"
                                    class="img-fluid" alt=""></div>
                            <span class="post-date">Tue, September 15</span>
                            <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit
                            </h3>
                            <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="post-box">
                            <div class="post-img"><img src="{{ asset('assets/frontend/assets/img/blog/blog-2.jpg') }}"
                                    class="img-fluid" alt=""></div>
                            <span class="post-date">Fri, August 28</span>
                            <h3 class="post-title">Et repellendus molestiae qui est sed omnis voluptates magnam</h3>
                            <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="post-box">
                            <div class="post-img"><img src="{{ asset('assets/frontend/assets/img/blog/blog-3.jpg') }}"
                                    class="img-fluid" alt=""></div>
                            <span class="post-date">Mon, July 11</span>
                            <h3 class="post-title">Quia assumenda est et veritatis aut quae</h3>
                            <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="post-box">
                            <div class="post-img"><img src="{{ asset('assets/frontend/assets/img/blog/blog-3.jpg') }}"
                                    class="img-fluid" alt=""></div>
                            <span class="post-date">Mon, July 11</span>
                            <h3 class="post-title">Quia assumenda est et veritatis aut quae</h3>
                            <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                </div>

            </div>

        </section> --}}
        <!-- End Recent Blog Posts Section -->










        <!-- ======= F.A.Q Section ======= -->
        {{-- <section id="faq" class="faq">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>F.A.Q</h2>
                    <p>Pertanyaan Yang Sering Ditanyakan</p>
                </header>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="accordion accordion-flush" id="faqlist1">
                            @foreach ($pertanyaan as $item)
                                @if ($item->id <= 3)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#faq-content-{{ $item->id }}">
                                                {{ $item->pertanyaan }}
                                            </button>
                                        </h2>
                                        <div id="faq-content-{{ $item->id }}" class="accordion-collapse collapse"
                                            data-bs-parent="#faqlist1">
                                            <div class="accordion-body">
                                                {{ $item->jawaban }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-6">

                        <div class="accordion accordion-flush" id="faqlist2">
                            @foreach ($pertanyaan as $item)
                                @if ($item->id > 3)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#faq2-content-{{ $item->id }}">
                                                {{ $item->pertanyaan }}
                                            </button>
                                        </h2>
                                        <div id="faq2-content-{{ $item->id }}" class="accordion-collapse collapse"
                                            data-bs-parent="#faqlist2">
                                            <div class="accordion-body">
                                                {{ $item->jawaban }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>

                </div>

            </div>

        </section> --}}
        <!-- End F.A.Q Section -->







        <!-- ======= Portfolio Section ======= -->
        {{-- <section id="portfolio" class="portfolio">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Portfolio</h2>
                    <p>Check our latest work</p>
                </header>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-app">App</li>
                            <li data-filter=".filter-card">Card</li>
                            <li data-filter=".filter-web">Web</li>
                        </ul>
                    </div>
                </div>

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-1.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 1</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-1.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 1"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-2.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Web 3</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-2.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="Web 3"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-3.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 2</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-3.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 2"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-4.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Card 2</h4>
                                <p>Card</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-4.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="Card 2"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-5.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Web 2</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-5.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="Web 2"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-6.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 3</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-6.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 3"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-7.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Card 1</h4>
                                <p>Card</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-7.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="Card 1"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-8.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Card 3</h4>
                                <p>Card</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-8.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="Card 3"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-9.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Web 3</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-9.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="Web 3"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section> --}}
        <!-- End Portfolio Section -->

        <!-- ======= Testimonials Section ======= -->
        {{-- <section id="testimonials" class="testimonials">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Testimonials</h2>
                    <p>What they are saying about us</p>
                </header>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                    rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                    risus at semper.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="{{ asset('assets/frontend/assets/img/testimonials/testimonials-1.jpg') }}"
                                        class="testimonial-img" alt="">
                                    <h3>Saul Goodman</h3>
                                    <h4>Ceo &amp; Founder</h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                    cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                                    legam anim culpa.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="{{ asset('assets/frontend/assets/img/testimonials/testimonials-2.jpg') }}"
                                        class="testimonial-img" alt="">
                                    <h3>Sara Wilsson</h3>
                                    <h4>Designer</h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam
                                    duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="{{ asset('assets/frontend/assets/img/testimonials/testimonials-3.jpg') }}"
                                        class="testimonial-img" alt="">
                                    <h3>Jena Karlis</h3>
                                    <h4>Store Owner</h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat
                                    minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore
                                    labore illum veniam.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="{{ asset('assets/frontend/assets/img/testimonials/testimonials-4.jpg') }}"
                                        class="testimonial-img" alt="">
                                    <h3>Matt Brandon</h3>
                                    <h4>Freelancer</h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster
                                    veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam
                                    culpa fore nisi cillum quid.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="{{ asset('assets/frontend/assets/img/testimonials/testimonials-5.jpg') }}"
                                        class="testimonial-img" alt="">
                                    <h3>John Larson</h3>
                                    <h4>Entrepreneur</h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section> --}}
        <!-- End Testimonials Section -->

        <!-- ======= Team Section ======= -->
        {{-- <section id="team" class="team">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Team</h2>
                    <p>Our hard working team</p>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('assets/frontend/assets/img/team/team-1.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Walter White</h4>
                                <span>Chief Executive Officer</span>
                                <p>Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae aut. Ipsum
                                    exercitationem iure minima enim corporis et voluptate.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('assets/frontend/assets/img/team/team-2.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Sarah Jhonson</h4>
                                <span>Product Manager</span>
                                <p>Quo esse repellendus quia id. Est eum et accusantium pariatur fugit nihil minima suscipit
                                    corporis. Voluptate sed quas reiciendis animi neque sapiente.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('assets/frontend/assets/img/team/team-3.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>William Anderson</h4>
                                <span>CTO</span>
                                <p>Vero omnis enim consequatur. Voluptas consectetur unde qui molestiae deserunt. Voluptates
                                    enim aut architecto porro aspernatur molestiae modi.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('assets/frontend/assets/img/team/team-4.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Amanda Jepson</h4>
                                <span>Accountant</span>
                                <p>Rerum voluptate non adipisci animi distinctio et deserunt amet voluptas. Quia aut aliquid
                                    doloremque ut possimus ipsum officia.</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section> --}}
        <!-- End Team Section -->

        <!-- ======= Clients Section ======= -->
        {{-- <section id="clients" class="clients">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Our Clients</h2>
                    <p>Temporibus omnis officia</p>
                </header>

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-1.png') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-2.png') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-3.png') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-4.png') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-5.png') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-6.png') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-7.png') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-8.png') }}" class="img-fluid"
                                alt=""></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </section> --}}
        <!-- End Clients Section -->

        <!-- ======= Recent Blog Posts Section ======= -->

        <!-- ======= Contact Section ======= -->
        {{-- <section id="contact" class="contact">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Kontak</h2>
                    <p>Hubungi Kami</p>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-6">

                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Address</h3>
                                    <p>Bahagia Permai Raya<br>Buah Batu</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Telepone</h3>
                                    <p>+62 **** **** **<br>+62 **** **** **</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email Us</h3>
                                    <p>Belajar.Link@gmail.com<br></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-clock"></i>
                                    <!-- <h3>Open Hours</h3>
                                                              <p>Monday - Friday<br>9:00AM - 05:00PM</p> -->
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <form action="forms/contact.php" method="post" class="php-email-form">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                                        required>
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit">Send Message</button>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>

            </div>

        </section> --}}
        <!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
