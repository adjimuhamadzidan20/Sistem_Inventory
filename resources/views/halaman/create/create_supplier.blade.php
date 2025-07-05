@extends('main_layout.main')

@section('container')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h3 class="fw-bold mb-3">Tambah Supplier Baru</h3>
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
                                        <input type="text" class="form-control" id="exampleFormControlNamaSupplier" placeholder="Masukkan Nama Supplier" name="nama_supplier">
                                        @error('nama_supplier')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror   
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlNamaAlamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="exampleFormControlNamaAlamat" placeholder="Masukkan Alamat Supplier" name="alamat">
                                        @error('alamat')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror   
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlNamaTelp" class="form-label">Telepon</label>
                                        <input type="text" class="form-control" id="exampleFormControlNamaTelp" placeholder="Masukkan Telepon" name="telp">
                                        @error('telp')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror   
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
