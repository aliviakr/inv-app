@extends('layouts.master')

@section('title', 'Data Barang Masuk')

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
        <h1 class="h3 mb-2 text-gray-800">Data Barang Masuk</h1>
        <div class="d-flex justify-content-end">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Barang Masuk</li>
                </ol>
            </nav>
        </div>
        <!-- DataTales -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahBarangMasuk">Tambah</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="10px">No.</th>
                                <th>Nama Barang</th>
                                <th>Harga Satuan</th>
                                <th>Jumlah (pcs)</th>
                                <th>Tanggal Masuk</th>
                                <th>Total (Rp)</th>
                                <th width="110px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang_masuk as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->barang->nama_barang }}</td>
                                    <td>{{ $item->harga_masuk }}</td>
                                    <td>{{ $item->jumlah_masuk }}</td>
                                    <td>{{ formatToDate($item->tanggal_masuk) }}</td>
                                    <td>{{ formatToRupiah($item->total_masuk) }}</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm edit-btn" data-toggle="modal" data-target="#editBarangMasuk{{ $item->id }}" data-id="{{ $item->id }}"><i class="fas fa-pen fa-sm fa-fw"></i></a>
                                        @include('BarangMasuk.modal-edit', ['item' => $item])
                                        <form action="{{ route('barang-masuk.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash fa-sm fa-fw"></i></button>
                                        </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@include('BarangMasuk.modal-create')
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#nama_barang').select2({
                placeholder: "-- Pilih Nama Barang --",
                allowClear: true
            });
            $('.edit-btn').on('click', function() {
                var barang_masuk_id = $(this).data('id');
                $.ajax({
                    url: "{{ url('barang-masuk') }}" + '/' + barang_masuk_id + '/edit',
                    method: 'GET',
                    success: function(data) {
                        $('#edit-barang-masuk').attr('action', "{{ url('barang-masuk') }}" + '/' + barang_masuk_id);
                        $('#nama_barang').val(data.data_barang_id);
                        $('#jumlah_masuk').val(data.jumlah_masuk);
                        $('#tanggal_masuk').val(data.tanggal_masuk);
                        $('#total_masuk').val(data.total_masuk);
                    }
                });
            });
        });
    </script>
    <!-- Page level plugins -->
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }} "></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script>
@endpush
