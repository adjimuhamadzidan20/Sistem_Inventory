@extends('main_layout.main')

@section('container')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h3 class="fw-bold mb-3">Data Satuan</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Tabel Satuan Barang</span>
                        <a href="{{ route('satuan_create') }}" class="btn btn-primary">
                            <i class="fa fa-plus me-1"></i>Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Satuan</th>
                                        <th>Created</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($satuan as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->satuan }}</td>
                                            <td>{{ $data->created_at }}</td>
                                            <td>
                                                <a href="{{ route('satuan_edit', ['id' => $data->id]) }}" class="btn btn-primary btn-sm">Ubah</a>
                                                <a href="{{ route('satuan_hapus', ['id' => $data->id]) }}" class="btn btn-primary btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
