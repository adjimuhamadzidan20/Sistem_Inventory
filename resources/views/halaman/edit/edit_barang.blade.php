@extends('main_layout.main')

@section('container')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h3 class="fw-bold mb-3">Edit Stok Barang</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('edit_barang_proses', ['id' => $barang->id]) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="exampleFormControlKD" class="form-label">KD Barang</label>
                                        <input type="text" class="form-control" id="exampleFormControlKD" name="kd_barang" value="{{ $barang->kd_barang }}" readonly> 
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlNamaBarang" class="form-label">Nama Barang</label>
                                        <input type="text" class="form-control" id="exampleFormControlNamaBarang" value="{{ $barang->nama_barang }}" name="nama_barang">
                                        @error('nama_barang')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror   
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlKategori" class="form-label">Kategori</label>
                                        <select class="form-select" id="exampleFormControlKategori" name="kategori"> 
                                            <option value="{{ $barang->kategori_id }}" selected>{{ $barang->kategori->kategori }}</option>
                                            @foreach ($kategori as $item)
                                                <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                                            @endforeach
                                        </select>
                                        @error('kategori')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror  
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlSatuan" class="form-label">Satuan</label>
                                        <select class="form-select" id="exampleFormControlSatuan" name="satuan"> 
                                            <option value="{{ $barang->satuan_id }}" selected>{{ $barang->satuan->satuan }}</option>
                                            @foreach ($satuan as $item)
                                                <option value="{{ $item->id }}">{{ $item->satuan }}</option>
                                            @endforeach
                                        </select>
                                        @error('satuan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror  
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleFormControlStok" class="form-label">Stok Barang</label>
                                        <input type="text" class="form-control" id="exampleFormControlStok" value="{{ $barang->stok_barang }}" name="jumlah">
                                        @error('jumlah')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror   
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('barang') }}" class="btn btn-primary">Kembali</a>
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
