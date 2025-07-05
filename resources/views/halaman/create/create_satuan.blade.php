@extends('main_layout.main')

@section('container')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h3 class="fw-bold mb-3">Tambah Satuan Baru</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('tambah_satuan_proses') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlSatuan" class="form-label">Satuan Barang</label>
                                        <input type="text" class="form-control" id="exampleFormControlSatuan" placeholder="Masukkan Satuan" name="satuan">
                                        @error('satuan')
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
