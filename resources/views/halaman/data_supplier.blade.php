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
                            <i class="fa fa-plus me-1"></i>Tambah
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
                                                <a href="{{ route('supplier_hapus', ['id' => $data->id]) }}" class="btn btn-primary btn-sm">Delete</a>
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

    <!-- Modal -->
    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold"> New</span>
                    <span class="fw-light"> Row </span>
                </h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <p class="small">
                    Create a new row using this form, make sure you
                    fill them all
                </p>
                <form>
                    <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">
                        <label>Name</label>
                        <input
                            id="addName"
                            type="text"
                            class="form-control"
                            placeholder="fill name"
                        />
                        </div>
                    </div>
                    <div class="col-md-6 pe-0">
                        <div class="form-group form-group-default">
                        <label>Position</label>
                        <input
                            id="addPosition"
                            type="text"
                            class="form-control"
                            placeholder="fill position"
                        />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                        <label>Office</label>
                        <input
                            id="addOffice"
                            type="text"
                            class="form-control"
                            placeholder="fill office"
                        />
                        </div>
                    </div>
                    </div>
                </form>
                </div>
                <div class="modal-footer border-0">
                <button
                    type="button"
                    id="addRowButton"
                    class="btn btn-primary">
                    Add
                </button>
                <button
                    type="button"
                    class="btn btn-danger"
                    data-dismiss="modal">
                    Close
                </button>
                </div>
            </div>
        </div>
    </div>
@endsection
