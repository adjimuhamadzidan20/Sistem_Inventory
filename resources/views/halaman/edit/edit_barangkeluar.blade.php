@extends('main_layout.main')

@section('container')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h3 class="fw-bold mb-3"><i class="fas fa-edit me-1"></i> Edit Data Barang Keluar</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('edit_barangkeluar_proses', ['id' => $barangkeluar->id ]) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="exampleFormControlKD" class="form-label">KD Barang Keluar</label>
                                        <input type="text" class="form-control" id="exampleFormControlKD" name="kd_barangkeluar" value="{{ $barangkeluar->kd_barangkeluar }}" readonly> 
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTglKeluar" class="form-label">Tanggal Keluar</label>
                                        <input type="date" class="form-control" id="exampleFormControlTglKeluar" value="{{ $barangkeluar->tanggal_keluar }}" name="tgl_keluar">
                                        @error('tgl_keluar')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror   
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlNamaBarang" class="form-label">Nama Barang</label>
                                        <select class="form-select" id="exampleFormControlNamaBarang" name="barang"> 
                                            <option value="{{ $barangkeluar->barang_id }}" selected>{{ $barangkeluar->barang->nama_barang }}</option>
                                            @foreach ($barang as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                                            @endforeach
                                        </select>
                                        @error('barang')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror   
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTujuan" class="form-label">Tujuan</label>
                                        <input type="text" class="form-control" id="exampleFormControlTujuan" value="{{ $barangkeluar->tujuan }}" name="tujuan">
                                        @error('tujuan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror  
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleFormControlJumlah" class="form-label">Jumlah</label>
                                        <input type="text" class="form-control" id="exampleFormControlJumlah" value="{{ $barangkeluar->jumlah }}" name="jumlah">
                                        @error('jumlah')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror   
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('barangkeluar') }}" class="btn btn-primary btn-sm">Kembali</a>
                                        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
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
