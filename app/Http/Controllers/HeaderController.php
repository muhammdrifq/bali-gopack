<?php

namespace App\Http\Controllers;

use App\Models\Tb_header;
use Illuminate\Http\Request;
use Validator;
class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = Tb_header::find(1);
        return view('admin.header-setting.index', compact('header'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tb_header  $tb_header
     * @return \Illuminate\Http\Response
     */
    public function show(Tb_header $tb_header)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tb_header  $tb_header
     * @return \Illuminate\Http\Response
     */
    public function edit(Tb_header $tb_header)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tb_header  $tb_header
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'gambar' => 'image|max:2048',
            'header' => 'required',
            'deskripsi' => 'required',
        ];

        $message = [
            'required' => 'Data wajib diisi!',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            session()->put('danger', 'Data yang anda input tidak valid, silahkan di ulang');
            return back()->withErrors($validation)->withInput();
        }
        $header = Tb_header::findOrFail($id);
        if ($request->hasFile('gambar')) {
            $header->deletegambar();
            $image = $request->gambar;
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/header/gambar/', $name);
            $header->gambar = $name;
        }
        $header->header = $request->header;
        $header->deskripsi = $request->deskripsi;
        $header->save();
        session()->put('success', 'Data Berhasil Di Simpan');
        return redirect('admin/header-setting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tb_header  $tb_header
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tb_header $tb_header)
    {
        //
    }
}
