<div class="sidebar-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
        <a href="{{ route('dashboard') }}" class="logo text-white fw-bold">
            SI INVENTORY
        </a>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
            </button>
            <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
            </button>
        </div>
        <button class="topbar-toggler more">
            <i class="gg-more-vertical-alt"></i>
        </button>
    </div>
    <!-- End Logo Header -->
</div>
<div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
        <ul class="nav nav-secondary">
            <li class="nav-item {{ ($active == 'Dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-section">
                <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Master Menu</h4>
            </li>
            <li class="nav-item {{ ($active == 'Kategori') ? 'active' : '' }}">
                <a href="{{ route('kategori') }}">
                    <i class="fas fa-layer-group"></i>
                    <p>Data Kategori</p>
                </a>
            </li>
            <li class="nav-item {{ ($active == 'Satuan') ? 'active' : '' }}">
                <a href="{{ route('satuan') }}">
                    <i class="fas fa-layer-group"></i>
                    <p>Data Satuan</p>
                </a>
            </li>
            <li class="nav-item {{ ($active == 'Supplier') ? 'active' : '' }}">
                <a href="{{ route('supplier') }}">
                    <i class="fas fa-layer-group"></i>
                    <p>Data Supplier</p>
                </a>
            </li>
            <li class="nav-item {{ ($active == 'Stok_Barang') ? 'active' : '' }}">
                <a href="{{ route('barang') }}">
                    <i class="fas fa-layer-group"></i>
                    <p>Data Barang</p>
                </a>
            </li>
            <li class="nav-item {{ ($active == 'Barang_Masuk') ? 'active' : '' }}">
                <a href="{{ route('barangmasuk') }}">
                    <i class="fas fa-layer-group"></i>
                    <p>Barang Masuk</p>
                </a>
            </li>
            <li class="nav-item {{ ($active == 'Barang_Keluar') ? 'active' : '' }}">
                <a href="{{ route('barangkeluar') }}">
                    <i class="fas fa-layer-group"></i>
                    <p>Barang Keluar</p>
                </a>
            </li>
            <li class="nav-item {{ ($active == 'Export') ? 'active' : '' }}">
                <a href="{{ route('export_file') }}">
                    <i class="fas fa-layer-group"></i>
                    <p>Export Data</p>
                </a>
            </li>
        </ul>
    </div>
</div>