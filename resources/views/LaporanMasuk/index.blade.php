@extends('layouts.master')

@section('title', 'Laporan Barang Masuk')

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
        <h1 class="h3 mb-2 text-gray-800">Laporan Barang Masuk</h1>
        <div class="d-flex justify-content-end">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Laporan Barang Masuk</li>
                </ol>
            </nav>
        </div>
        <!-- DataTales -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#filterLaporanMasuk"><i class="fas fa-print fa-sm fa-fw mr-2"></i>
                Filter
            </a>
            <a href="{{ route('laporan-masuk.cetak-pdf') }}" class="btn btn-danger btn-sm" ><i class="fas fa-print fa-sm fa-fw mr-2"></i>Export PDF</a>
            @include('LaporanMasuk.modal')
            <!-- <a href="" class="btn btn-success btn-sm"><i class="fas fa-file-excel fa-sm fa-fw mr-2"></i>
                Export Excel
            </a> -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="20px">No.</th>
                                <th>Nama Barang</th>
                                <th>Harga Satuan</th>
                                <th>Kategori</th>
                                <th>Jumlah (pcs)</th>
                                <th>Tanggal Masuk</th>
                                <th>Total (Rp)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang_masuk as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->barang->nama_barang }}</td>
                                    <td>{{ $item->harga_masuk }}</td>
                                    <td>{{ $item->barang->kategori->kategori }}</td>
                                    <td>{{ $item->jumlah_masuk }}</td>
                                    <td>{{ formatToDate($item->tanggal_masuk) }}</td>
                                    <td>{{ formatToRupiah($item->total_masuk)}}</td>
                                </tr>
                            @endforeach
                        </tbody>
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
