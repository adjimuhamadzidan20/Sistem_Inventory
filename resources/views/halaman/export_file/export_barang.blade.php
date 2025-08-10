@extends('halaman.data_export')

@section('export-section')
    <div>
        <div class="row mb-4">
            <div class="col-12 col-md-4">
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
            <div class="col mt-3 mt-md-0">
                <div class="d-flex justify-content-center justify-content-md-end">
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
            <div class="table-responsive">
                <table class="display table table-striped table-hover" id="barang-datatables">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-nowrap">KD Barang</th>
                            <th class="text-nowrap">Nama Barang</th>
                            <th class="text-nowrap">Kategori</th>
                            <th class="text-center text-nowrap">Satuan</th>
                            <th class="text-center text-nowrap">Stok Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-nowrap">{{ $data->kd_barang }}</td>
                                <td class="text-nowrap">{{ $data->nama_barang }}</td>
                                <td class="text-nowrap">{{ $data->kategori->kategori }}</td>
                                <td class="text-center text-nowrap">{{ $data->satuan->satuan }}</td>
                                <td class="text-center text-nowrap">{{ $data->stok_barang }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
@endsection
