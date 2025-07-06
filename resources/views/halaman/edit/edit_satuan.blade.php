@extends('main_layout.main')

@section('container')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h3 class="fw-bold mb-3">Edit Data Satuan</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('edit_satuan_proses', ['id' => $satuan->id]) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4">
                                        <label for="exampleFormControlSatuan" class="form-label">Satuan Barang</label>
                                        <input type="text" class="form-control" id="exampleFormControlSatuan" value="{{ $satuan->satuan }}" name="satuan">
                                        @error('satuan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror   
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('satuan') }}" class="btn btn-primary">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Edit</button>
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
