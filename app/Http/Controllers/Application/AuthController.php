<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\app\Tb_auth;
use App\Models\app\Tb_personalia;
use App\Models\app\Tb_perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function dashboard(Tb_perusahaan $tb_perusahaan)
    {
        
        $data_perusahaan = Tb_perusahaan::find($tb_perusahaan->id);
        return view('customer.index', compact('data_perusahaan'));
    }
    public function login()
    {
        return view('customer.auth.login');
    }

    public function register()
    {
        return view('customer.auth.register');
    }

    public function authenticate(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ];

        $message = [
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Email Sudah ada!',
            'password.required' => 'Password Tidak boleh Kosong',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            session()->put(
                'danger',
                'Data yang anda input tidak valid, silahkan di ulang'
            );
            return redirect()->back()->withErrors($validation)->withInput();
        } else {
            $user = Tb_auth::where('email', $request->email)->first();

            if ($user !== null && Hash::check($request->password, $user->password)) {
                $data_user = session('user', $user);
                session(['user' => $data_user]);
                return redirect('app/customer/dashboard');
            } else {
                return redirect()->back()->withInput()->with('error', 'email atau password yang anda masukkan tidak sesuai, silahkan isi kembali.');
            }
        }

    }

    public function store(Request $request)
    {
        $request->validate([
            'kuota' => 'required',
            'bulan' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'confirm-password' => 'required|same:password',
            'perusahaan' => 'required|string',
            'bidang_usaha' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'kode_pos' => 'required',
        ]);

        $sebulan = 10000;
        $enambulan = 9000;
        $duabelasbulan = 8000;
        $personalia = new Tb_personalia();
        $personalia->kuota = $request->kuota;
        $personalia->bulan = $request->bulan;

        if ($request->bulan == 1) {
            $harga = 1 * $request->kuota * $sebulan;
            $personalia->harga = $harga;
            
        } elseif ($request->bulan == 6) {
            $harga = 6 * $request->kuota * $enambulan;
            $personalia->harga = $harga;
            
        } elseif ($request->bulan == 12) {
            $harga = 12 * $request->kuota * $duabelasbulan;
            $personalia->harga = $harga;
            
        }
        $personalia->save();

        $perusahaan = new Tb_perusahaan();
        $perusahaan->name = $request->perusahaan;
        $perusahaan->bidang_usaha = $request->bidang_usaha;
        $perusahaan->alamat = $request->alamat;
        $perusahaan->no_telepon = $request->no_telepon;
        $perusahaan->kode_pos = $request->kode_pos;
        $perusahaan->save();

        $defaultRole = "customer";

        $auth = new Tb_auth();
        $auth->name = $request->name;
        $auth->email = $request->email;
        $auth->role = $defaultRole;
        $auth->password = Hash::make($request->password);
        $auth->save();
        return redirect('/app/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
