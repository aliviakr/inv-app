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
    <h2 class="text-center">Laporan Barang Keluar</h2>
    <table>
        <thead>
            <tr>
                <th width="20px">No.</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Jumlah (pcs)</th>
                <th>Tanggal Keluar</th>
                <th>Total (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang_keluar as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->barang->nama_barang }}</td>
                    <td>{{ $item->barang->kategori->kategori }}</td>
                    <td>{{ $item->jumlah_keluar }}</td>
                    <td>{{ formatToDate($item->tanggal_keluar) }}</td>
                    <td>{{ formatToRupiah($item->total_keluar) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
