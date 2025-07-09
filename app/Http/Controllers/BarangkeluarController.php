<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barangkeluar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BarangkeluarController extends Controller
{
    public function barang_keluar()
    {
        $modelBarangkeluar = new Barangkeluar();
        $data = $modelBarangkeluar->get();

        return view('halaman.data_barangkeluar', [
            'title' => 'Barang Keluar',
            'active' => 'Barang_Keluar',
            'barangkeluar' => $data
        ]);
    }

    public function create_barangkeluar()
    {
        $modelBarang = new Barang();

        $dataBarang = $modelBarang->get();

        // untuk kode barang
        $waktu = Carbon::now()->format('Y');
        $lastBarang = Barangkeluar::whereYear('created_at', $waktu)
            ->orderBy('kd_barangkeluar', 'desc')
            ->first();

        if (!$lastBarang) {
            $no = 1;
        } else {
            $lastNumber = (int) substr($lastBarang->kd_barangkeluar, -3);
            $no = $lastNumber + 1;
        }

        $kodeBarang = 'BK-25' . $waktu . '-' . str_pad($no, 3, '0', STR_PAD_LEFT);
        return view('halaman.create.create_barangkeluar', [
            'title' => 'Tambah Barang Keluar',
            'active' => 'Barang_Keluar',
            'kode' => $kodeBarang,
            'barang' => $dataBarang,
        ]);
    }

    public function edit_barangkeluar($id)
    {
        $data = Barangkeluar::find($id);
        $modelBarang = new Barang();
        $dataBarang = $modelBarang->get();

        return view('halaman.edit.edit_barangkeluar', [
            'title' => 'Edit Barang Keluar',
            'active' => 'Barang_Keluar',
            'barangkeluar' => $data,
            'barang' => $dataBarang,
        ]);
    }

    public function create_barangkeluar_proses(Request $request)
    {
        $pesanValidasi = [
            'tgl_keluar.required' => 'Tanggal keluar harus diisi!',
            'barang.required' => 'Nama barang harus dipilih!',
            'jumlah.required' => 'Jumlah barang tidak boleh kosong!',
            'tujuan.required' => 'Tujuan tempat harus diisi!',
        ];

        $validasi = Validator::make($request->all(), [
            'tgl_keluar' => 'required',
            'barang' => 'required',
            'jumlah' => 'required',
            'tujuan' => 'required',
        ], $pesanValidasi);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        } else {
            $data['kd_barangkeluar'] = $request->kd_barangkeluar;
            $data['tanggal_keluar'] = $request->tgl_keluar;
            $data['barang_id'] = $request->barang;
            $data['jumlah'] = $request->jumlah;
            $data['tujuan'] = $request->tujuan;

            $modelBarang = new Barang();
            $dataBarang = $modelBarang->find($request->barang);

            $stokBarang = $dataBarang->stok_barang;
            $jumlahBarangKeluar = $request->jumlah;
            $jumlah = $stokBarang - $jumlahBarangKeluar;

            Barangkeluar::create($data);

            // menambahkan stok barang dari jumlah masuk barang
            $tabelBarang = DB::table('barangs');
            $tabelBarang->where('id', $request->barang)->update(['stok_barang' => $jumlah]);
        }

        return redirect()->route('barangkeluar')->with('success', 'Data barang keluar berhasil ditambahkan!');;
    }

    public function edit_barangkeluar_proses(Request $request, $id)
    {
        $pesanValidasi = [
            'tgl_keluar.required' => 'Tanggal keluar harus diisi!',
            'barang.required' => 'Nama barang harus dipilih!',
            'jumlah.required' => 'Jumlah barang tidak boleh kosong!',
            'tujuan.required' => 'Tujaun tempat harus diisi!',
        ];

        $validasi = Validator::make($request->all(), [
            'tgl_keluar' => 'required',
            'barang' => 'required',
            'jumlah' => 'required',
            'tujuan' => 'required',
        ], $pesanValidasi);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        } else {
            $data['kd_barangkeluar'] = $request->kd_barangkeluar;
            $data['tanggal_keluar'] = $request->tgl_keluar;
            $data['barang_id'] = $request->barang;
            $data['jumlah'] = $request->jumlah;
            $data['tujuan'] = $request->tujuan;

            if ($request->jumlah) {
                $data['jumlah'] = $request->jumlah;

                $modelBarang = new Barang();
                $dataBarang = $modelBarang->find($request->barang);

                $tabelBarang = DB::table('barangs');
                $tabelBarangmasuk = DB::table('barangmasuks');
                $dataBarangmasuk = $tabelBarangmasuk->where('kd_barangmasuk', $request->kd_barangmasuk)->first();

                $stokBarang = $dataBarang->stok_barang;
                $jumlahBarangMasuk = $request->jumlah;

                if ($jumlahBarangMasuk > $dataBarangmasuk->jumlah) {
                    $jumlah = $stokBarang + $jumlahBarangMasuk;
                    $tabelBarang->where('id', $request->barang)->update(['stok_barang' => $jumlah]);
                } else if ($jumlahBarangMasuk < $dataBarangmasuk->jumlah) {
                    $jumlah = $stokBarang - $jumlahBarangMasuk;
                    $tabelBarang->where('id', $request->barang)->update(['stok_barang' => $jumlah]);
                }
            }

            Barangkeluar::whereId($id)->update($data);
        }

        return redirect()->route('barangkeluar')->with('success', 'Data barang keluar berhasil terubah!');;
    }

    public function delete_barangkeluar($id)
    {
        $data = Barangkeluar::find($id);
        $data->delete();
        return redirect()->route('barangkeluar')->with('success', 'Data barang keluar berhasil terhapus!');;
    }
}
