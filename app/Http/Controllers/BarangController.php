<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan data barang
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data barang
        $request->validate([
            'nama_barang' => 'required',
            'kategori' => 'required',
            'stok' => 'required',
            'harga_masuk' => 'required',
            'harga_keluar' => 'required'
        ]);

        // dd($request->all());
        // Menambah data barang
        Barang::create([
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'harga_masuk' =>$request->harga_masuk,
            'harga_keluar' =>$request->harga_keluar
        ]);


        return redirect('/barang')->with('success', 'Data barang berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Menampilkan halaman edit barang
        $barang = Barang::findOrFail($id);
        return view('barang.modal-edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data barang
        $request->validate([
            'nama_barang' => 'required',
            'kategori' => 'required',
            'stok' => 'required',
            'harga_masuk' => 'required',
            'harga_keluar' => 'required'
        ]);

        // Mengubah data barang
        $barang = Barang::findOrFail($id);
        $barang->update([
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'harga_masuk' =>$request->harga_masuk,
            'harga_keluar' =>$request->harga_keluar
        ]);

        return redirect('/barang')->with('success', 'Data barang berhasil diubah!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Menghapus data barang
        Barang::destroy($id);
        return redirect('/barang')->with('success', 'Data barang berhasil dihapus!');
    }

}
