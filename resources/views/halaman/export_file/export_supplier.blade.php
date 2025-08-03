@extends('halaman.data_export')

@section('export-section')
    <div>
        <div class="d-flex justify-content-start mb-4">
            <a href="{{ route('export_supplier') }}?export_excel=supplier" class="btn btn-primary btn-sm me-1">
                <i class="fas fa-file-excel me-1"></i>
                Cetak Excel
            </a>
            <a href="{{ route('export_supplier') }}?export=supplier" class="btn btn-primary btn-sm">
                <i class="fas fa-file-pdf me-1"></i>
                Cetak PDF
            </a>
        </div>
        
        <div class="border rounded px-2 py-3">
            <table class="display table table-striped table-hover" id="supplier-datatables">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>KD Supplier</th>
                        <th>Nama Supplier</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($supplier as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $data->kd_supplier }}</td>
                            <td>{{ $data->nama_supplier }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->telepon }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
