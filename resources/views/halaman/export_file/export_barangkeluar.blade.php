@extends('halaman.data_export')

@section('export-section')
    <div>
        <div class="row mb-4">
            <div class="col-4 d-flex">
                <input type="month" class="form-control me-2 form-control-sm">
                <a href="" class="btn btn-primary btn-sm">
                    Pilih
                </a>
            </div>
            <div class="col">
                <div class="d-flex justify-content-end">
                    <a href="" class="btn btn-primary btn-sm me-1">
                        <i class="fa fa-print me-1"></i>
                        Cetak Excel
                    </a>
                    <a href="{{ route('export_file') }}?export=barangkeluar" class="btn btn-primary btn-sm">
                        <i class="fa fa-print me-1"></i>
                        Cetak PDF
                    </a>
                </div>
            </div>
        </div>

        <table class="display table table-striped table-hover" id="barangkeluar-datatables">
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
    </div>
@endsection
