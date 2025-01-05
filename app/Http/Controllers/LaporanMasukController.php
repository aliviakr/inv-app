<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Barang;
use App\Models\BarangMasuk;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class LaporanMasukController
{
    public function index()
    {
        $barang_masuk = BarangMasuk::all();
        $barang = Barang::all();
        return view('LaporanMasuk.index', compact('barang_masuk', 'barang'));
    }

    public function Filterdata()
    {
        $barang_masuk = BarangMasuk::all();
        $barang = Barang::all();
        
        // Filter berdasarkan tanggal
        if (request('tanggal_mulai') && request('tanggal_selesai')) {
            $barang_masuk = BarangMasuk::whereBetween('tanggal_masuk', [request('tanggal_mulai'), request('tanggal_selesai')])->get();
            if ($barang_masuk->isEmpty()) {
                return redirect()->route('laporan-masuk.index')->with('warning', 'Data tidak ditemukan!');
            }
        }
        // $pdf = PDF::loadView('LaporanMasuk.cetak-pdf', compact('barang_masuk', 'barang'));
        // return $pdf->download('laporan-barang-masuk.pdf');
    }

    public function cetakPdf()
    {
        $barang_masuk = BarangMasuk::all();
        $barang = Barang::all();
        $pdf = PDF::loadView('LaporanMasuk.cetak-pdf', compact('barang_masuk', 'barang'));
        return $pdf->download('laporan-barang-masuk.pdf');
    }

    // public function cetakExcel()
    // {
    //     $spreadsheet = new Spreadsheet();
    //     $sheet = $spreadsheet->getActiveSheet();

    //     $sheet->getStyle('A1:F1')->getFont()->setBold(true);

    //     // Judul
    //     $sheet->mergeCells('A1:F1');
    //     $sheet->setCellValue('A1', 'Laporan Barang Masuk');
    //     $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

    //     // Kolom Lebar
    //     $sheet->getColumnDimension('A')->setWidth(5);
    //     $sheet->getColumnDimension('B')->setWidth(20);
    //     $sheet->getColumnDimension('C')->setWidth(20);
    //     $sheet->getColumnDimension('D')->setWidth(20);
    //     $sheet->getColumnDimension('E')->setWidth(20);
    //     $sheet->getColumnDimension('F')->setWidth(20);

    //     // Header Table
    //     $sheet->setCellValue('A2', 'No');
    //     $sheet->setCellValue('B2', 'Nama Barang');
    //     $sheet->setCellValue('C2', 'Kategori');
    //     $sheet->setCellValue('D2', 'Jumlah Masuk');
    //     $sheet->setCellValue('E2', 'Tanggal Masuk');
    //     $sheet->setCellValue('F2', 'Total');

    //     $barang_masuk = BarangMasuk::all();
    //     $no = 1;
    //     $cell = 3;
    //     foreach ($barang_masuk as $data) {
    //         $sheet->setCellValue('A' . $cell, $no++);
    //         $sheet->setCellValue('B' . $cell, $data->barang->nama_barang);
    //         $sheet->setCellValue('C' . $cell, $data->barang->kategori->kategori);
    //         $sheet->setCellValue('D' . $cell, $data->jumlah_masuk);
    //         $sheet->setCellValue('E' . $cell, $data->tanggal_masuk);
    //         $sheet->setCellValue('F' . $cell, $data->total_masuk);
    //         $cell++;
    //     }

    //     $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    //     $filename = 'laporan-barang-masuk.xlsx';
    //     $writer->save($filename);

    //     return response()->download($filename)->deleteFileAfterSend(true);
    // }
}
