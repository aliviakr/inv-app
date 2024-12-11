<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangKeluar;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

use Barryvdh\DomPDF\Facade\Pdf as PDF;

class LaporanKeluarController
{
    public function index()
    {
        $barang_keluar = BarangKeluar::all();
        $barang = Barang::all();
        return view('LaporanKeluar.index', compact('barang_keluar', 'barang'));
    }

    public function cetakPdf()
    {
        $barang_keluar = BarangKeluar::all();
        $barang = Barang::all();

        // Filter berdasarkan tanggal
        if (request('tanggal_mulai') && request('tanggal_selesai')) {
            $barang_keluar = BarangKeluar::whereBetween('tanggal_keluar', [request('tanggal_mulai'), request('tanggal_selesai')])->get();
            if ($barang_keluar->isEmpty()) {
                return redirect()->route('laporan-keluar.index')->with('warning', 'Data tidak ditemukan!');
            }
        }
        $pdf = PDF::loadView('LaporanKeluar.cetak-pdf', compact('barang_keluar', 'barang'));
        return $pdf->download('laporan-barang-keluar.pdf');
    }

    public function cetakExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->getStyle('A1:F1')->getFont()->setBold(true);

        // Judul
        $sheet->mergeCells('A1:F1');
        $sheet->setCellValue('A1', 'Riwayat Barang Keluar');
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

        // Kolom Lebar
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(20);

        // Header Table
        $sheet->setCellValue('A2', 'No');
        $sheet->setCellValue('B2', 'Nama Barang');
        $sheet->setCellValue('C2', 'Jenis Barang');
        $sheet->setCellValue('D2', 'Jumlah Keluar');
        $sheet->setCellValue('E2', 'Tanggal Keluar');

        $barang_keluar = BarangKeluar::all();
        $no = 1;
        $cell = 3;
        foreach ($barang_keluar as $data) {
            $sheet->setCellValue('A' . $cell, $no++);
            $sheet->setCellValue('B' . $cell, $data->barang->nama_barang);
            $sheet->setCellValue('C' . $cell, $data->barang->jenis_barang->jenis_barang);
            $sheet->setCellValue('D' . $cell, $data->jumlah_keluar);
            $sheet->setCellValue('E' . $cell, $data->tanggal_keluar);
            $cell++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('riwayat-barang-keluar.xlsx');

        return response()->download(public_path('riwayat-barang-keluar.xlsx'));

    }

}
