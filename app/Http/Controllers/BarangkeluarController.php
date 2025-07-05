<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangkeluarController extends Controller
{
    public function barang_keluar()
    {
        return view('halaman.data_barangkeluar', [
            'title' => 'Barang Keluar',
            'active' => 'Barang_Keluar'
        ]);
    }
}
