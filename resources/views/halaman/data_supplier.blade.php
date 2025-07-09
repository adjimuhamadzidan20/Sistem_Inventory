@extends('main_layout.main')

@section('container')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h3 class="fw-bold mb-3">Data Supplier</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Tabel Supplier Barang</span>
                        <a href="{{ route('supplier_create') }}" class="btn btn-primary">
                            <i class="fa fa-plus me-1"></i>
                            Tambah data
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>KD Supplier</th>
                                        <th>Nama Supplier</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Opsi</th>
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
                                            <td>
                                                <a href="{{ route('supplier_edit', ['id' => $data->id]) }}" class="btn btn-primary btn-sm">Ubah</a>

                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $data->id }}">Delete</button>
                                            </td>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus data supplier</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Anda yakin ingin menghapus {{ $data->nama_supplier }}?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-black" data-bs-dismiss="modal">Batal</button>
                                                            <a href="{{ route('supplier_hapus', ['id' => $data->id]) }}" class="btn btn-primary">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
