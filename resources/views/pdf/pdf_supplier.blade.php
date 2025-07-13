<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SI Inventory | Data Supplier PDF</title>
</head>
<body>
    <h2>Data Supplier</h2>
    <table width="100%" border="1" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>KD Supplier</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>Telepon</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($supplier as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->kd_supplier }}</td>
                    <td>{{ $data->nama_supplier }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->telepon }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>