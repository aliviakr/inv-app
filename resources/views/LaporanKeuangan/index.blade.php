@extends('layouts.master')

@section('title', 'Laporan Keuangan')

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('navbar')
    @include('layouts.navbar')
@endsection

@push('styles')
    <!-- Custom styles for this page -->
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Laporan Keuangan</h1>
        <div class="d-flex justify-content-end">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Laporan Keuangan'</li>
                </ol>
            </nav>
        </div>
        <!-- DataTales -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#filterLaporanKeuangan"><i class="fas fa-print fa-sm fa-fw mr-2"></i>
                Filter Data
            </a>
            <a href="{{ route('laporan-keuangan.cetak-pdf') }}" class="btn btn-danger btn-sm" ><i class="fas fa-print fa-sm fa-fw mr-2"></i>Export PDF</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="20px">No.</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Pemasukan</th>
                                <th>Pengeluaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?> {{-- Inisialisasi nomor urut --}}
                            
                            {{-- Loop untuk menampilkan data dari barang masuk --}}
                            @if ($barang_masuk->count() > 0)
                                @foreach ($barang_masuk as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td> {{-- Tampilkan dan tambahkan nomor urut --}}
                                        <td>{{ formatToDate($item->tanggal_masuk) }}</td>
                                        <td>Masuk {{ $item->barang->nama_barang }}</td>
                                        <td>{{ formatToRupiah($item->total_masuk) }}</td>
                                        <td>-</td>
                                    </tr>
                                @endforeach
                            @endif

                            {{-- Loop untuk menampilkan data dari barang keluar --}}
                            @if ($barang_keluar->count() > 0)
                                @foreach ($barang_keluar as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td> {{-- Tampilkan dan tambahkan nomor urut --}}
                                        <td>{{ formatToDate($item->tanggal_keluar) }}</td>
                                        <td>Keluar {{ $item->barang->nama_barang }}</td>
                                        <td>-</td>
                                        <td>{{ formatToRupiah($item->total_keluar) }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">Total</th>
                                <th>{{  formatToRupiah($barang_masuk->sum('total_masuk')) }}</th>
                                <th>{{  formatToRupiah($barang_keluar->sum('total_keluar')) }}</th>
                            </tr>
                            <tr>
                                <th colspan="3">Laba</th>
                                <th colspan="2" class="text-center">{{  formatToRupiah($barang_masuk->sum('total_masuk') - $barang_keluar->sum('total_keluar')) }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }} "></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script>
@endpush
