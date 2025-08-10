@extends('main_layout.main')

@section('container')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h3 class="fw-bold mb-3"><i class="fas fa-layer-group me-1"></i> Data Barang Masuk</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Tabel Barang Masuk</span>
                        <a href="{{ route('barangmasuk_create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus me-1"></i>
                            Tambah data
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-nowrap">Kode</th>
                                        <th class="text-center text-nowrap">Tgl Masuk</th>
                                        <th class="text-center text-nowrap">Waktu</th>
                                        <th class="text-nowrap">Nama Barang</th>
                                        <th class="text-center text-nowrap">Jumlah</th>
                                        <th class="text-nowrap">Supplier</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barangmasuk as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-nowrap">{{ $data->kd_barangmasuk }}</td>
                                            <td class="text-center text-nowrap">{{ $data->tanggal_masuk }}</td>
                                            <td class="text-center text-nowrap">{{ $data->created_at->format('H:i') }}</td>
                                            <td class="text-nowrap">{{ $data->barang->nama_barang }}</td>
                                            <td class="text-center text-nowrap">{{ $data->jumlah }}</td>
                                            <td class="text-nowrap">{{ $data->supplier->nama_supplier }}</td>
                                            <td class="text-center text-nowrap">
                                                <a href="{{ route('barangmasuk_edit', ['id' => $data->id]) }}" class="btn btn-primary btn-sm" title="ubah data"><i class="fas fa-edit"></i></a>

                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $data->id }}" title="hapus data"><i class="fas fa-trash"></i></button>
                                            </td>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-trash me-1"></i> Hapus data barang masuk</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Anda yakin ingin menghapus {{ $data->kd_barangmasuk }}?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-black btn-sm" data-bs-dismiss="modal">Batal</button>
                                                            <a href="{{ route('barangmasuk_hapus', ['id' => $data->id]) }}" class="btn btn-primary btn-sm">Hapus</a>
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
