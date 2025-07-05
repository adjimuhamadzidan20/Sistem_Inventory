<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangmasukController extends Controller
{
    public function barang_masuk()
    {
        return view('halaman.data_barangmasuk', [
            'title' => 'Barang Masuk',
            'active' => 'Barang_Masuk'
        ]);
    }
}
