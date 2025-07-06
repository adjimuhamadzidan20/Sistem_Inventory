@extends('main_layout.main')

@section('container')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h3 class="fw-bold mb-3">Edit Data Barang Masuk</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('edit_barangmasuk_proses', ['id' => $barangmasuk->id ]) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="exampleFormControlKD" class="form-label">KD Barang Masuk</label>
                                        <input type="text" class="form-control" id="exampleFormControlKD" name="kd_barangmasuk" value="{{ $barangmasuk->kd_barangmasuk }}" readonly> 
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTglMasuk" class="form-label">Tanggal Masuk</label>
                                        <input type="date" class="form-control" id="exampleFormControlTglMasuk" value="{{ $barangmasuk->tanggal_masuk }}" name="tgl_masuk">
                                        @error('tgl_masuk')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror   
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlNamaBarang" class="form-label">Nama Barang</label>
                                        <select class="form-select" id="exampleFormControlNamaBarang" name="barang"> 
                                            <option value="{{ $barangmasuk->barang_id }}" selected>{{ $barangmasuk->barang->nama_barang }}</option>
                                            @foreach ($barang as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                                            @endforeach
                                        </select>
                                        @error('barang')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror   
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlNamaSupplier" class="form-label">Supplier</label>
                                        <select class="form-select" id="exampleFormControlNamaSupplier" name="supplier"> 
                                            <option value="{{ $barangmasuk->supplier_id }}" selected>{{ $barangmasuk->supplier->nama_supplier }}</option>
                                            @foreach ($supplier as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_supplier }}</option>
                                            @endforeach
                                        </select>
                                        @error('supplier')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror   
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleFormControlJumlah" class="form-label">Jumlah</label>
                                        <input type="text" class="form-control" id="exampleFormControlJumlah" value="{{ $barangmasuk->jumlah }}" name="jumlah">
                                        @error('jumlah')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror   
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('barangmasuk') }}" class="btn btn-primary">Kembali</a>
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
