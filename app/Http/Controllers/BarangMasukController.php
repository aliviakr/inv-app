<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Barang;
use App\Models\BarangMasuk;

class BarangMasukController
{
    public function index()
    {
        $barang_masuk = BarangMasuk::all();
        $barang = Barang::all();
        return view('BarangMasuk.index', compact('barang_masuk', 'barang'));
    }

    public function create()
    {
        $barang = Barang::all();
        return view('barang_masuk.create', compact('barang'));
    }

    public function store(Request $request)
    {
        // Validasi data barang masuk
        $request->validate([
            'data_barang_id' => 'required',
            'jumlah_masuk' => 'required',
            'tanggal_masuk' => 'required',
            'total_masuk' => 'required',
        ]);

        // Menambah data barang masuk
        BarangMasuk::create([
            'data_barang_id' => $request->data_barang_id,
            'jumlah_masuk' => $request->jumlah_masuk,
            'tanggal_masuk' => $request->tanggal_masuk,
            'total_masuk' => $request->total_masuk,
        ]);

        // Update jumlah barang di inventory
        $barang = Barang::findOrFail($request->data_barang_id);
        $barang->increment('jumlah_masuk', $request->jumlah_masuk);
        // Update total masuk
        $barang->increment('total_masuk', $request->total_masuk);

        return redirect()->route('barang-masuk.index')->with('success', 'Data barang masuk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $barang_masuk = BarangMasuk::findOrFail($id);
        $barang = Barang::all();
        return view('barang_masuk.edit', compact('barang_masuk', 'barang'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data barang masuk
        $request->validate([
            'data_barang_id' => 'required',
            'jumlah_masuk' => 'required',
            'tanggal_masuk' => 'required',
            'total_masuk' => 'required',
        ]);

        // Mengambil data barang masuk
        $barang_masuk = BarangMasuk::findOrFail($id);

        // Menghitung selisih jumlah barang sebelum dan sesudah update
        $selisih = $request->jumlah_masuk - $barang_masuk->jumlah_masuk;

        // Update data barang masuk
        $barang_masuk->update([
            'data_barang_id' => $request->data_barang_id,
            'data_suplier_id' => $request->data_suplier_id,
            'jumlah_masuk' => $request->jumlah_masuk,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        // Update jumlah barang di inventory
        $barang = Barang::findOrFail($request->data_barang_id);
        $barang->increment('jumlah', $selisih);

        return redirect()->route('barang-masuk.index')->with('success', 'Data barang masuk berhasil diupdate!');

    }

    public function destroy($id)
    {
        // Hapus data barang masuk
        $barang_masuk = BarangMasuk::findOrFail($id);
        
        // Update jumlah barang di inventory
        $barang = Barang::findOrFail($barang_masuk->data_barang_id);
        $barang->decrement('jumlah', $barang_masuk->jumlah_masuk);
        
        // Hapus data barang masuk
        $barang_masuk->delete();
        
        return redirect()->route('barang-masuk.index')->with('success', 'Data barang masuk berhasil dihapus!');
    }

}
