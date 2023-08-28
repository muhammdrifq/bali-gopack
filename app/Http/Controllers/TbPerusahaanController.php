<?php

namespace App\Http\Controllers;

use App\Models\Tb_perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TbPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perusahaan = Tb_perusahaan::all();
        return view('admin.perusahaan.index', compact('perusahaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.perusahaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'gambar' => 'required|image:2048',
        ];

        $message = [
            'required' => 'Data tidak boleh kosong',
            'unique' => 'User Sudah ada!',
            'email' => 'Email maksimal :max karakter',
            'min' => 'Password minimam :min karakter',
            'same' => 'Konfirmasi Password tidak sama dengan Password',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            session()->put(
                'danger',
                'Data yang anda input tidak valid, silahkan di ulang'
            );
            return back()
                ->withErrors($validation)
                ->withInput();
        }
        $perusahaan = new Tb_perusahaan();
        if ($request->hasFile('gambar')) {
            $image = $request->gambar;
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/perusahaan/gambar/', $name);
            $perusahaan->gambar = $name;
        }
        $perusahaan->save();
        session()->put('success', 'Data Berhasil ditambahkan');
        return redirect()->route('perusahaan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tb_perusahaan  $tb_perusahaan
     * @return \Illuminate\Http\Response
     */
    public function show(Tb_perusahaan $tb_perusahaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tb_perusahaan  $tb_perusahaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tb_perusahaan $tb_perusahaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tb_perusahaan  $tb_perusahaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'gambar' => 'required|image:2048',
        ];

        $message = [
            'required' => 'Data tidak boleh kosong',
            'unique' => 'User Sudah ada!',
            'email' => 'Email maksimal :max karakter',
            'min' => 'Password minimam :min karakter',
            'same' => 'Konfirmasi Password tidak sama dengan Password',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            session()->put(
                'danger',
                'Data yang anda input tidak valid, silahkan di ulang'
            );
            return back()
                ->withErrors($validation)
                ->withInput();
        }
        $perusahaan = Tb_perusahaan::findOrFail($id);
        if ($request->hasFile('gambar')) {
            $image = $request->gambar;
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/perusahaan/gambar/', $name);
            $perusahaan->gambar = $name;
        }
        $perusahaan->save();
        session()->put('success', 'Data Berhasil diubah');
        return redirect()->route('perusahaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tb_perusahaan  $tb_perusahaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perusahaan = Tb_perusahaan::findOrFail($id);
        $perusahaan->deleteGambar();
        $perusahaan->delete();
        session()->put('success', 'Data Berhasil dihapus');
        return redirect()->route('perusahaan.index');
    }
}