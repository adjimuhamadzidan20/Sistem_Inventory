@extends('halaman.data_export')

@section('export-section')
    <div>
        <div class="row mb-4">
            <div class="col-4">
                <form action="{{ route('export_barang') }}" method="get">
                    <div class="d-flex">
                        <select class="form-select form-control-sm me-2" aria-label="Default select example" name="cari_kategori">
                            <option value="" selected>-- Pilih Kategori --</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary btn-sm">
                            Filter
                        </button>
                    </div>
                </form>
            </div>
            <div class="col">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('export_barang') }}?export_excel=barang&kategori_excel={{ $request->get('cari_kategori') }}" class="btn btn-primary btn-sm me-1">
                        <i class="fas fa-file-excel me-1"></i>
                        Cetak Excel
                    </a>
                    <a href="{{ route('export_barang') }}?export=barang&kategori={{ $request->get('cari_kategori') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-file-pdf me-1"></i>
                        Cetak PDF
                    </a>
                </div>
            </div>
        </div>
        
        <div class="border rounded px-2 py-3">
            <table class="display table table-striped table-hover" id="barang-datatables">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>KD Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th class="text-center">Satuan</th>
                        <th class="text-center">Stok Barang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $data->kd_barang }}</td>
                            <td>{{ $data->nama_barang }}</td>
                            <td>{{ $data->kategori->kategori }}</td>
                            <td class="text-center">{{ $data->satuan->satuan }}</td>
                            <td class="text-center">{{ $data->stok_barang }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
@endsection
