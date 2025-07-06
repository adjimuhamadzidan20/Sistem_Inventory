@extends('main_layout.main')

@section('container')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h3 class="fw-bold mb-3">Tambah Data Barang Keluar</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('tambah_barangkeluar_proses') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlKD" class="form-label">KD Barang Keluar</label>
                                        <input type="text" class="form-control" id="exampleFormControlKD" name="kd_barangkeluar" value="{{ $kode }}" readonly> 
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTglKeluar" class="form-label">Tanggal Keluar</label>
                                        <input type="date" class="form-control" id="exampleFormControlTglKeluar" name="tgl_keluar">
                                        @error('tgl_keluar')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror   
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlNamaBarang" class="form-label">Nama Barang</label>
                                        <select class="form-select" id="exampleFormControlNamaBarang" name="barang"> 
                                            <option value="" selected>-- Pilih Barang --</option>
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
                                        <input type="text" class="form-control" id="exampleFormControlTujuan" placeholder="Masukkan Tujuan Tempat" name="tujuan">
                                        @error('tujuan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror   
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleFormControlJumlah" class="form-label">Jumlah</label>
                                        <input type="text" class="form-control" id="exampleFormControlJumlah" placeholder="Masukkan Jumlah Barang" name="jumlah">
                                        @error('jumlah')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror   
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('barangkeluar') }}" class="btn btn-primary">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
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
