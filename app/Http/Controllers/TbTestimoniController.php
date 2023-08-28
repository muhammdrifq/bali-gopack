<?php

namespace App\Http\Controllers;

use App\Models\Tb_testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TbTestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimoni = Tb_testimoni::all();
        return view('admin.testimoni.index', compact('testimoni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimoni.create');
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
            'name' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'gambar' => 'image:2048',
            'testimoni' => 'required',
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
        $testimoni = new Tb_testimoni();
        $testimoni->name = $request->name;
        $testimoni->instansi = $request->instansi;
        if ($request->hasFile('gambar')) {
            $image = $request->gambar;
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/testimoni/gambar/', $name);
            $testimoni->gambar = $name;
        }
        $testimoni->testimoni = $request->testimoni;
        $testimoni->save();
        session()->put('success', 'Data Berhasil ditambahkan');
        return redirect()->route('testimoni.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tb_testimoni  $tbTestimoni
     * @return \Illuminate\Http\Response
     */
    public function show(Tb_testimoni $tbTestimoni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tb_testimoni  $tbTestimoni
     * @return \Illuminate\Http\Response
     */
    public function edit(Tb_testimoni $tbTestimoni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tb_testimoni  $tbTestimoni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'string|max:255',
            'instansi' => 'string|max:255',
            'gambar' => 'image:2048',
            'testimoni' => 'required',
        ];

        $message = [
            'required' => 'Data wajib diisi!',
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
        $testimoni = Tb_testimoni::findOrFail($id);
        $testimoni->name = $request->name;
        $testimoni->instansi = $request->instansi;
        if ($request->hasFile('gambar')) {
            $testimoni->deleteGambar();
            $image = $request->gambar;
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/testimoni/gambar/', $name);
            $testimoni->gambar = $name;
        }
        $testimoni->testimoni = $request->testimoni;
        $testimoni->save();
        session()->put('success', 'Data Berhasil diedit');
        return redirect()->route('testimoni.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tb_testimoni  $tbTestimoni
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimoni = Tb_testimoni::findOrFail($id);
        $testimoni->deleteGambar();
        $testimoni->delete();
        session()->put('success', 'Data Berhasil dihapus');
        return redirect()->route('testimoni.index');
    }
}