@extends('main_layout.main')

@section('container')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h3 class="fw-bold mb-3">Tambah Kategori Baru</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('tambah_kategori_proses') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlKategori" class="form-label">Nama Kategori</label>
                                        <input type="text" class="form-control" id="exampleFormControlKategori" placeholder="Masukkan Kategori" name="kategori">
                                        @error('kategori')
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
