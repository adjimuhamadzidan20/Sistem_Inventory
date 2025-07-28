<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SI Inventory | Data Barang Keluar PDF</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
        }
        h1 {
            text-align: left;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }
        th, td {
            border: 1px solid #333;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 15px;
            text-align: right;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <h1>SI Inventory</h1>
    <h3>Data Barang Keluar</h3>
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

    <div class="footer">
        Dicetak pada: {{ \Carbon\Carbon::now()->format('d-m-Y H:i') }}
    </div>
</body>
</html>