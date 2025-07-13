<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SI Inventory | Data Barang PDF</title>
</head>
<body>
    <h2>Data Barang</h2>
    <table width="100%" border="1" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>KD Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Satuan</th>
                <th>Stok Barang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->kd_barang }}</td>
                    <td>{{ $data->nama_barang }}</td>
                    <td>{{ $data->kategori->kategori }}</td>
                    <td>{{ $data->satuan->satuan }}</td>
                    <td>{{ $data->stok_barang }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>