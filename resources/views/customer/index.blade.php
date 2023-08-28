@extends('layouts.customer')

@section('ckeditor')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#ckeditor'))
            .catch(error => {
                console.error(error);
            });
    </script>
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
@endsection

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white pb-2 fw-bold">Dashboard</h1>
                    <h4 class="text-white op-7 mb-2">Selamat Datang, <b>{{ $user->name }}</b></h4>
                </div>
                {{-- <div class="ml-md-auto py-2 py-md-0">
                    <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
                    <a href="#" class="btn btn-secondary btn-round">Add Customer</a>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
