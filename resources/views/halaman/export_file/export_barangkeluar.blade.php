@extends('halaman.data_export')

@section('export-section')
    <div>
        <div class="row mb-4">
            <div class="col-12 col-md-4">
                <form action="{{ route('export_barangkeluar') }}" method="get">
                    <div class="d-flex">
                        <input type="month" class="form-control me-2 form-control-sm" name="bulan">
                        <button type="submit" class="btn btn-primary btn-sm">
                            Filter
                        </button>
                    </div>
                </form>
            </div>
            <div class="col mt-3 mt-md-0">
                <div class="d-flex justify-content-center justify-content-md-end">
                    <a href="{{ route('export_barangkeluar') }}?export_excel=barangkeluar&bulan_excel={{ $request->get('bulan') }}" class="btn btn-primary btn-sm me-1">
                        <i class="fas fa-file-excel me-1"></i>
                        Cetak Excel
                    </a>
                    <a href="{{ route('export_barangkeluar') }}?export=barangkeluar&bulan={{ $request->get('bulan') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-file-pdf me-1"></i>
                        Cetak PDF
                    </a>
                </div>
            </div>
        </div>

        <div class="border rounded px-2 py-3">
            <div class="table-responsive">
                <table class="display table table-striped table-hover" id="barangkeluar-datatables">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-nowrap">Kode</th>
                            <th class="text-center text-nowrap">Tgl Keluar</th>
                            <th class="text-center text-nowrap">Waktu</th>
                            <th class="text-nowrap">Nama Barang</th>
                            <th class="text-center text-nowrap">Jumlah</th>
                            <th class="text-nowrap">Tujuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangkeluar as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-nowrap">{{ $data->kd_barangkeluar }}</td>
                                <td class="text-center text-nowrap">{{ $data->tanggal_keluar }}</td>
                                <td class="text-center text-nowrap">{{ $data->created_at->format('H:i') }}</td>
                                <td class="text-nowrap">{{ $data->barang->nama_barang }}</td>
                                <td class="text-center text-nowrap">{{ $data->jumlah }}</td>
                                <td class="text-nowrap">{{ $data->tujuan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
