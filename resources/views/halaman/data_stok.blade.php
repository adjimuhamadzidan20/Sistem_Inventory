@extends('main_layout.main')

@section('container')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h3 class="fw-bold mb-3">Data Stok Barang</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Tabel Stok Barang</span>
                        <a href="{{ route('barang_create') }}" class="btn btn-primary">
                            <i class="fa fa-plus me-1"></i>Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>KD Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Kategori</th>
                                        <th>Satuan</th>
                                        <th>Stok Barang</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->kd_barang }}</td>
                                            <td>{{ $data->nama_barang }}</td>
                                            <td>{{ $data->kategori->kategori }}</td>
                                            <td>{{ $data->satuan->satuan }}</td>
                                            <td>{{ $data->stok_barang }}</td>
                                            <td>
                                                <a href="{{ route('barang_edit', ['id' => $data->id]) }}" class="btn btn-primary btn-sm">Ubah</a>
                                                <a href="{{ route('barang_hapus', ['id' => $data->id]) }}" class="btn btn-primary btn-sm">Delete</a>
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
