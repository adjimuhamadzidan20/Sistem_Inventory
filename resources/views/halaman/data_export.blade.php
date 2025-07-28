@extends('main_layout.main')

@section('container')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h3 class="fw-bold mb-3"><i class="fas fa-print me-1"></i> Export File</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header"><span>Export file untuk mencetak data laporan</span></div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link {{ ($active_export == 'Export_Supplier') ? 'active' : '' }}" href="{{ route('export_supplier') }}">Data Supplier</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ ($active_export == 'Export_Barang') ? 'active' : '' }}" href="{{ route('export_barang') }}">Data Barang</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ ($active_export == 'Export_Barang_Masuk') ? 'active' : '' }}" href="{{ route('export_barangmasuk') }}">Barang Masuk</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ ($active_export == 'Export_Barang_Keluar') ? 'active' : '' }}" href="{{ route('export_barangkeluar') }}">Barang Keluar</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
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
