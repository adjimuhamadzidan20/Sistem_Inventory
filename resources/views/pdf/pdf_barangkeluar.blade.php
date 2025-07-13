<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SI Inventory | Data Barang Keluar PDF</title>
</head>
<body>
    <h2>Data Barang Keluar</h2>
    <table width="100%" border="1" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Tgl Keluar</th>
                <th>Waktu</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Tujuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangkeluar as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->kd_barangkeluar }}</td>
                    <td>{{ $data->tanggal_keluar }}</td>
                    <td>{{ $data->created_at->format('H:i') }}</td>
                    <td>{{ $data->barang->nama_barang }}</td>
                    <td>{{ $data->jumlah }}</td>
                    <td>{{ $data->tujuan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>