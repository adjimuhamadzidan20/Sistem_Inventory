@extends('halaman.data_export')

@section('export-section')
    <div>
        <div class="row mb-4">
            <div class="col-4">
                <form action="{{ route('export_barangmasuk') }}" method="get">
                    <div class="d-flex">
                        <input type="month" class="form-control me-2 form-control-sm" name="bulan">
                        <button type="submit" class="btn btn-primary btn-sm">
                            Filter
                        </button>
                    </div>
                </form>
            </div>
            <div class="col">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('export_barangmasuk') }}?export_excel=barangmasuk&bulan_excel={{ $request->get('bulan') }}" class="btn btn-primary btn-sm me-1">
                        <i class="fas fa-file-excel me-1"></i>
                        Cetak Excel
                    </a>
                    <a href="{{ route('export_barangmasuk') }}?export=barangmasuk&bulan={{ $request->get('bulan') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-file-pdf me-1"></i>
                        Cetak PDF
                    </a>
                </div>
            </div>
        </div>

        <div class="border rounded px-2 py-3">
            <table class="display table table-striped table-hover" id="barangmasuk-datatables">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Kode</th>
                        <th class="text-center">Tgl Masuk</th>
                        <th class="text-center">Waktu</th>
                        <th>Nama Barang</th>
                        <th class="text-center">Jumlah</th>
                        <th>Supplier</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangmasuk as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $data->kd_barangmasuk }}</td>
                            <td class="text-center">{{ $data->tanggal_masuk }}</td>
                            <td class="text-center">{{ $data->created_at->format('H:i') }}</td>
                            <td>{{ $data->barang->nama_barang }}</td>
                            <td class="text-center">{{ $data->jumlah }}</td>
                            <td>{{ $data->supplier->nama_supplier }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
