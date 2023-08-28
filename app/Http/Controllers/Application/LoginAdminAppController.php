<?php

namespace App\Http\Controllers\Application;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class LoginAdminAppController extends Controller
{
    public function index()
    {
        return view('admin-app.login');
    }

    public function dashboard()
    {
        return view('admin-app.index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // $penggunas = Tb_pengguna::where('id_user', Auth::user()->id)->get();
            // foreach ($penggunas as $pengguna) {
            //     $pengguna;
            // }
            if (Auth::user()->id === 1) {
                session()->put('success', 'Anda telah berhasil login');
                return redirect()->intended('/app/admin/dashboard');
            } else {
                Auth::logout();
                toastr()->error(
                    'Akun Anda Di nonaktifkan Untuk Sementara',
                    'Gagal Login'
                );
                return redirect('/app/admin/login');
            }
        }
        toastr()->error('Akun Tidak Di Temukan', 'Gagal Login');
        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/app/admin/login');
    }
}