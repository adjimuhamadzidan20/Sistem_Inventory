@extends('main_layout.main')

@section('container')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h3 class="fw-bold mb-3"><i class="fas fa-plus me-1"></i> Tambah Supplier Baru</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('tambah_supplier_proses') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlKD" class="form-label">KD Supplier</label>
                                        <input type="text" class="form-control" id="exampleFormControlKD" name="kd_supplier" value="{{ $kode }}" readonly> 
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlNamaSupplier" class="form-label">Nama Supplier</label>
                                        <input type="text" class="form-control" id="exampleFormControlNamaSupplier" placeholder="Masukkan Nama Supplier" name="nama_supplier" value="{{ old('nama_supplier') }}">
                                        @error('nama_supplier')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror   
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlAlamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="exampleFormControlAlamat" placeholder="Masukkan Alamat Supplier" name="alamat" value="{{ old('alamat') }}">
                                        @error('alamat')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror   
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleFormControlTelp" class="form-label">Telepon</label>
                                        <input type="text" class="form-control" id="exampleFormControlTelp" placeholder="Masukkan Telepon" name="telp" value="{{ old('telp') }}">
                                        @error('telp')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror   
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('supplier') }}" class="btn btn-primary btn-sm">Kembali</a>
                                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
