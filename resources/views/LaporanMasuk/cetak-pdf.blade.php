<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan Masuk</title>

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
    <h2 class="text-center">Laporan Barang Masuk</h2>
    <table>
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
            @php
                $totalKeseluruhan = 0;
            @endphp
            @foreach ($barang_masuk as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->barang->nama_barang }}</td>
                    <td>{{ $item->harga_masuk }}</td>
                    <td>{{ $item->barang->kategori->kategori }}</td>
                    <td>{{ $item->jumlah_keluar }}</td>
                    <td>{{ formatToDate($item->tanggal_masuk) }}</td>
                    <td>{{ formatToRupiah($item->total_masuk) }}</td>
                </tr>
                @php
                    $totalKeseluruhan += $item->total_masuk;
                @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5">Total</th>
                <th>{{ formatToRupiah($totalKeseluruhan) }}</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>
