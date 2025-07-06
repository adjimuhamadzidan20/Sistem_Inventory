<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barangkeluar;
use App\Models\Barangmasuk;
use App\Models\Kategori;
use App\Models\Satuan;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $modelKategori = new Kategori();
        $modelSatuan = new Satuan();
        $modelSupplier = new Supplier();
        $modelBarang = new Barang();
        $modelBarangMasuk = new Barangmasuk();
        $modelBarangKeluar = new Barangkeluar();

        $dataKategori = $modelKategori->get();
        $dataSatuan = $modelSatuan->get();
        $dataSupplier = $modelSupplier->get();
        $dataBarang = $modelBarang->get();
        $dataBarangMasuk = $modelBarangMasuk->get();
        $dataBarangKeluar = $modelBarangKeluar->get();

        return view('halaman.dashboard', [
            'title' => 'Dashboard',
            'active' => 'Dashboard',
            'kategori' => $dataKategori,
            'satuan' => $dataSatuan,
            'supplier' => $dataSupplier,
            'barang' => $dataBarang,
            'barangmasuk' => $dataBarangMasuk,
            'barangkeluar' => $dataBarangKeluar,
        ]);
    }
}
