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
                            <i class="fa fa-plus me-1"></i>
                            Tambah data
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

                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $data->id }}">Delete</button>
                                            </td>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus data satuan</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Anda yakin ingin menghapus {{ $data->satuan }}?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-black" data-bs-dismiss="modal">Batal</button>
                                                            <a href="{{ route('satuan_hapus', ['id' => $data->id]) }}" class="btn btn-primary">Hapus</a>
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
