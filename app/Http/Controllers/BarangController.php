<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;

use Barryvdh\DomPDF\Facade\Pdf as PDF;

class BarangController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan data barang
        $barang = Barang::all();
        $kategori = Kategori::all();
        return view('barang.index', compact('barang', 'kategori'));
    }

    public function cetakPdf()
    {
        $barang = Barang::all();

        $pdf = PDF::loadView('Barang.cetak-pdf', compact('barang'));
        return $pdf->download('barang.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data barang
        $request->validate([
            'nama_barang' => 'required',
            'kategori_id' => 'required',
            // 'stok' => 'required',
            'harga_masuk' => 'required',
            'harga_keluar' => 'required'
        ]);

        // dd($request->all());
        // Menambah data barang
        Barang::create([
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            // 'stok' => $request->stok,
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
            'kategori_id' => 'required',
            // 'stok' => 'required',
            'harga_masuk' => 'required',
            'harga_keluar' => 'required'
        ]);

        // Mengubah data barang
        $barang = Barang::findOrFail($id);
        $barang->update([
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            // 'stok' => $request->stok,
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
