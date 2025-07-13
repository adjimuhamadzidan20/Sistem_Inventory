@extends('main_layout.main')

@section('container')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h3 class="fw-bold mb-3">Export File</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header"><span>Export file untuk mencetak data laporan</span></div>
                    <div class="card-body">
                        <div class="row px-3">
                            <div class="col-5 col-md-2 border rounded me-2 p-2">
                                <div class="nav flex-column nav-pills nav-primary" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link {{ ($active == 'Export_Supplier') ? 'active' : '' }}" href="{{ route('export_supplier') }}">Data Supplier</a>
                                    <a class="nav-link {{ ($active == 'Export_Barang') ? 'active' : '' }}" href="{{ route('export_barang') }}">Data Barang</a>
                                    <a class="nav-link {{ ($active == 'Export_Barang_Masuk') ? 'active' : '' }}" href="{{ route('export_barangmasuk') }}">Barang Masuk</a>
                                    <a class="nav-link {{ ($active == 'Export_Barang_Keluar') ? 'active' : '' }}" href="{{ route('export_barangkeluar') }}">Barang Keluar</a>
                                </div>
                            </div>
                            <div class="col border rounded py-3">
                                <div class="tab-content" id="v-pills-tabContent">
                                    @yield('export-section')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
