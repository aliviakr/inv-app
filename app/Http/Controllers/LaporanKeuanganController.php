<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Models\LaporanKeuangan;
use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;

use Barryvdh\DomPDF\Facade\Pdf as PDF;


class LaporanKeuanganController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $keuangan = LaporanKeuangan::all();
        $barang = Barang::all();
        $barang_keluar = BarangKeluar::all();
        $barang_masuk = BarangMasuk::all();

        // Menetapkan date yang akan dikirim ke view

        // Mengembalikan view keuangan.index
        return view('LaporanKeuangan.index', compact('barang', 'barang_masuk', 'barang_keluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function cetakPdf()
    {
        $barang = Barang::all();
        $barang_masuk = BarangMasuk::all();
        $barang_keluar = BarangKeluar::all();
        $pdf = PDF::loadView('LaporanKeuangan.cetak-pdf', compact('barang', 'barang_masuk', 'barang_keluar'));
        return $pdf->download('LaporanKeuangan.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
