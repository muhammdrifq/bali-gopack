@extends('layouts.member')

@section('content')
  
    <br><br><br><br>
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
                            <option value="bidang">Pilih Bidang Usaha</option>
                            <option value="usaha">Pilih Bidang Usaha</option>
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
@endsection
