@extends('halaman.data_export')

@section('export-section')
    <div>
        <div class="d-flex justify-content-end mb-4">
            <a href="" class="btn btn-primary btn-sm me-1">
                <i class="fa fa-print me-1"></i>
                Cetak Excel
            </a>
            <a href="{{ route('export_file') }}?export=supplier" class="btn btn-primary btn-sm">
                <i class="fa fa-print me-1"></i>
                Cetak PDF
            </a>
        </div>
        
        <div class="table-responsive">
            <table class="display table table-striped table-hover" id="supplier-datatables">
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
        </div>
    </div>
@endsection
