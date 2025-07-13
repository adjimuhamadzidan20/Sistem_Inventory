@extends('halaman.data_export')

@section('export-section')
    <div>
        <div class="row mb-4">
            <form action="{{ route('export_barang') }}" method="get">
                <div class="col-4 d-flex">
                    <select class="form-select form-control-sm me-2" aria-label="Default select example" name="cari_kategori">
                        <option value="" selected>-- Pilih Kategori --</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Pilih
                    </button>
                </div>
            </form>
            <div class="col">
                <div class="d-flex justify-content-end">
                    <a href="" class="btn btn-primary btn-sm me-1">
                        <i class="fa fa-print me-1"></i>
                        Cetak Excel
                    </a>
                    <a href="{{ route('export_file') }}?export=barang" class="btn btn-primary btn-sm">
                        <i class="fa fa-print me-1"></i>
                        Cetak PDF
                    </a>
                </div>
            </div>
        </div>

        <table class="display table table-striped table-hover" id="barang-datatables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>KD Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Satuan</th>
                    <th>Stok Barang</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->kd_barang }}</td>
                        <td>{{ $data->nama_barang }}</td>
                        <td>{{ $data->kategori->kategori }}</td>
                        <td>{{ $data->satuan->satuan }}</td>
                        <td>{{ $data->stok_barang }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
