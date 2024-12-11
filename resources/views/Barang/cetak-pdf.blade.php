<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Barang</title>

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
    <h2 class="text-center">Cetak Data Barang</h2>
    <table>
        <thead>
            <tr>
                <th width="20px">No.</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Jumlah (pcs)</th>
                <th>Harga Masuk</th>
                <th>Harga Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->kategori->kategori }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>{{ $item->harga_masuk }}</td>
                    <td>{{ $item->harga_keluar}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
