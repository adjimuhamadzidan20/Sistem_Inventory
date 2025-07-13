<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barangkeluar;
use App\Models\Barangmasuk;
use App\Models\Kategori;
use App\Models\Supplier;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class ExportfileController extends Controller
{
    public function export_supplier(Request $request)
    {
        $modelSupplier = new Supplier();
        $datasupplier = $modelSupplier->get();

        if ($request->get('export') == 'supplier') {
            $pdf = Pdf::loadView('pdf.pdf_supplier', ['supplier' => $datasupplier]);
            return $pdf->download('Data_Supplier.pdf');
        }

        return view('halaman.export_file.export_supplier', [
            'title' => 'Export Data Supplier',
            'active' => 'Export_Supplier',
            'supplier' => $datasupplier,
        ]);
    }

    public function export_barang(Request $request)
    {
        $modelBarang = Barang::query();
        $modelKategori = new Kategori();
        $dataKategori = $modelKategori->get();

        $cariDataKategori = $request->get('cari_kategori');
        if ($cariDataKategori) {
            $databarang = $modelBarang->where('kategori_id', $cariDataKategori);
        }

        $databarang = $modelBarang->get();

        if ($request->get('export') == 'barang') {
            $pdf = Pdf::loadView('pdf.pdf_barang', ['barang' => $databarang]);
            return $pdf->download('Data_Barang.pdf');
        }

        return view('halaman.export_file.export_barang', [
            'title' => 'Export Data Barang',
            'active' => 'Export_Barang',
            'barang' => $databarang,
            'kategori' => $dataKategori,
            'request' => $request
        ]);
    }

    public function export_barangmasuk(Request $request)
    {
        $modelBarangmasuk = new Barangmasuk();
        $databrgmasuk = $modelBarangmasuk->get();

        if ($request->get('export') == 'barangmasuk') {
            $pdf = Pdf::loadView('pdf.pdf_barangmasuk', ['barangmasuk' => $databrgmasuk]);
            return $pdf->download('Data_Barangmasuk.pdf');
        }

        return view('halaman.export_file.export_barangmasuk', [
            'title' => 'Export Data Barang Masuk',
            'active' => 'Export_Barang_Masuk',
            'barangmasuk' => $databrgmasuk,
        ]);
    }

    public function export_barangkeluar(Request $request)
    {
        $modelBarangkeluar = new Barangkeluar();
        $databrgkeluar = $modelBarangkeluar->get();

        if ($request->get('export') == 'barangkeluar') {
            $pdf = Pdf::loadView('pdf.pdf_barangkeluar', ['barangkeluar' => $databrgkeluar]);
            return $pdf->download('Data_Barangkeluar.pdf');
        }

        return view('halaman.export_file.export_barangkeluar', [
            'title' => 'Export Data Barang Keluar',
            'active' => 'Export_Barang_Keluar',
            'barangkeluar' => $databrgkeluar,
        ]);
    }
}
