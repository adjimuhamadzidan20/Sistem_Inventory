<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Satuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StokBarangController extends Controller
{
    public function barang()
    {
        $modelBarang = new Barang();
        $data = $modelBarang->get();

        return view('halaman.data_stok', [
            'title' => 'Stok Barang',
            'active' => 'Stok_Barang',
            'barang' => $data
        ]);
    }

    public function create_barang()
    {
        $modelKategori = new Kategori();
        $modelSatuan = new Satuan();

        $dataKategori = $modelKategori->get();
        $dataSatuan = $modelSatuan->get();

        // untuk kode barang
        $waktu = Carbon::now()->format('Y');
        $lastBarang = Barang::whereYear('created_at', $waktu)
            ->orderBy('kd_barang', 'desc')
            ->first();

        if (!$lastBarang) {
            $no = 1;
        } else {
            $lastNumber = (int) substr($lastBarang->kd_barang, -3);
            $no = $lastNumber + 1;
        }

        $kodeBarang = 'BRG-15' . $waktu . '-' . str_pad($no, 3, '0', STR_PAD_LEFT);
        return view('halaman.create.create_barang', [
            'title' => 'Tambah Barang',
            'active' => 'Stok_Barang',
            'kode' => $kodeBarang,
            'kategori' => $dataKategori,
            'satuan' => $dataSatuan
        ]);
    }

    public function edit_barang($id)
    {
        $data = Barang::find($id);
        $modelKategori = new Kategori();
        $modelSatuan = new Satuan();

        $dataKategori = $modelKategori->get();
        $dataSatuan = $modelSatuan->get();

        return view('halaman.edit.edit_barang', [
            'title' => 'Edit Barang',
            'active' => 'Stok_Barang',
            'barang' => $data,
            'kategori' => $dataKategori,
            'satuan' => $dataSatuan
        ]);
    }

    public function create_barang_proses(Request $request)
    {
        $pesanValidasi = [
            'nama_barang.required' => 'Nama barang tidak boleh kosong!',
            'kategori.required' => 'Kategori harus dipilih!',
            'satuan.required' => 'Satuan harus dipilih!',
            'jumlah.required' => 'Jumlah tidak boleh kosong!',
        ];

        $validasi = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'kategori' => 'required',
            'satuan' => 'required',
            'jumlah' => 'required',
        ], $pesanValidasi);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $data['kd_barang'] = $request->kd_barang;
        $data['nama_barang'] = $request->nama_barang;
        $data['kategori_id'] = $request->kategori;
        $data['satuan_id'] = $request->satuan;
        $data['stok_barang'] = $request->jumlah;

        Barang::create($data);
        return redirect()->route('barang')->with('success', 'Data barang berhasil ditambahkan!');
    }

    public function edit_barang_proses(Request $request, $id)
    {
        $pesanValidasi = [
            'nama_barang.required' => 'Nama barang tidak boleh kosong!',
            'kategori.required' => 'Kategori harus dipilih!',
            'satuan.required' => 'Satuan harus dipilih!',
            'jumlah.required' => 'Jumlah tidak boleh kosong!',
        ];

        $validasi = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'kategori' => 'required',
            'satuan' => 'required',
            'jumlah' => 'required',
        ], $pesanValidasi);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $data['kd_barang'] = $request->kd_barang;
        $data['nama_barang'] = $request->nama_barang;
        $data['kategori_id'] = $request->kategori;
        $data['satuan_id'] = $request->satuan;
        $data['stok_barang'] = $request->jumlah;

        Barang::whereId($id)->update($data);
        return redirect()->route('barang')->with('success', 'Data barang berhasil terubah!');
    }

    public function delete_barang($id)
    {
        $data = Barang::find($id);
        $data->delete();
        return redirect()->route('barang')->with('success', 'Data barang berhasil terhapus!');
    }
}
