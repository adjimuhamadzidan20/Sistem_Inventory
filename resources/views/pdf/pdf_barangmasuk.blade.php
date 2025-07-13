<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SI Inventory | Data Barang Masuk PDF</title>
</head>
<body>
    <h2>Data Barang Masuk</h2>
    <table width="100%" border="1" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Tgl Masuk</th>
                <th>Waktu</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Supplier</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangmasuk as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->kd_barangmasuk }}</td>
                    <td>{{ $data->tanggal_masuk }}</td>
                    <td>{{ $data->created_at->format('H:i') }}</td>
                    <td>{{ $data->barang->nama_barang }}</td>
                    <td>{{ $data->jumlah }}</td>
                    <td>{{ $data->supplier->nama_supplier }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>