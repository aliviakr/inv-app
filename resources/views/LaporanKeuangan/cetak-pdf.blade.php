<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan Keluar</title>

    <style>
        * {
            /* font-family: "consolas", sans-serif; */ /* Komentar CSS yang valid */
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 5px;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>
    <h2 class="text-center">Laporan Keuanganr</h2>
    <table>
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
</body>
</html>
