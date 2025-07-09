<?php

namespace App\Http\Controllers;

use App\Models\Barangmasuk;
use App\Models\Barang;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BarangmasukController extends Controller
{
    public function barang_masuk()
    {
        $modelBarangmasuk = new Barangmasuk();
        $data = $modelBarangmasuk->get();

        return view('halaman.data_barangmasuk', [
            'title' => 'Barang Masuk',
            'active' => 'Barang_Masuk',
            'barangmasuk' => $data
        ]);
    }

    public function create_barangmasuk()
    {
        $modelBarang = new Barang();
        $modelSupplier = new Supplier();

        $dataBarang = $modelBarang->get();
        $dataSupplier = $modelSupplier->get();

        // untuk kode barang
        $waktu = Carbon::now()->format('Y');
        $lastBarang = Barangmasuk::whereYear('created_at', $waktu)
            ->orderBy('kd_barangmasuk', 'desc')
            ->first();

        if (!$lastBarang) {
            $no = 1;
        } else {
            $lastNumber = (int) substr($lastBarang->kd_barangmasuk, -3);
            $no = $lastNumber + 1;
        }

        $kodeBarang = 'BM-20' . $waktu . '-' . str_pad($no, 3, '0', STR_PAD_LEFT);
        return view('halaman.create.create_barangmasuk', [
            'title' => 'Tambah Barang Masuk',
            'active' => 'Barang_Masuk',
            'kode' => $kodeBarang,
            'barang' => $dataBarang,
            'supplier' => $dataSupplier
        ]);
    }

    public function edit_barangmasuk($id)
    {
        $data = Barangmasuk::find($id);
        $modelBarang = new Barang();
        $modelSupplier = new Supplier();

        $dataBarang = $modelBarang->get();
        $dataSupplier = $modelSupplier->get();

        return view('halaman.edit.edit_barangmasuk', [
            'title' => 'Edit Barang Masuk',
            'active' => 'Barang_Masuk',
            'barangmasuk' => $data,
            'barang' => $dataBarang,
            'supplier' => $dataSupplier
        ]);
    }

    public function create_barangmasuk_proses(Request $request)
    {
        $pesanValidasi = [
            'tgl_masuk.required' => 'Tanggal masuk harus diisi!',
            'barang.required' => 'Nama barang harus dipilih!',
            'jumlah.required' => 'Jumlah barang tidak boleh kosong!',
            'supplier.required' => 'Nama supplier harus dipilih!',
        ];

        $validasi = Validator::make($request->all(), [
            'tgl_masuk' => 'required',
            'barang' => 'required',
            'jumlah' => 'required',
            'supplier' => 'required',
        ], $pesanValidasi);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        } else {
            $data['kd_barangmasuk'] = $request->kd_barangmasuk;
            $data['tanggal_masuk'] = $request->tgl_masuk;
            $data['barang_id'] = $request->barang;
            $data['jumlah'] = $request->jumlah;
            $data['supplier_id'] = $request->supplier;

            $modelBarang = new Barang();
            $dataBarang = $modelBarang->find($request->barang);

            $stokBarang = $dataBarang->stok_barang;
            $jumlahBarangMasuk = $request->jumlah;
            $jumlah = $stokBarang + $jumlahBarangMasuk;

            Barangmasuk::create($data);

            // menambahkan stok barang dari jumlah masuk barang
            $tabelBarang = DB::table('barangs');
            $tabelBarang->where('id', $request->barang)->update(['stok_barang' => $jumlah]);
        }

        return redirect()->route('barangmasuk')->with('success', 'Data barang masuk berhasil ditambahkan!');;
    }

    public function edit_barangmasuk_proses(Request $request, $id)
    {
        $pesanValidasi = [
            'tgl_masuk.required' => 'Tanggal masuk harus diisi!',
            'barang.required' => 'Nama barang harus dipilih!',
            'jumlah.required' => 'Jumlah barang tidak boleh kosong!',
            'supplier.required' => 'Nama supplier harus dipilih!',
        ];

        $validasi = Validator::make($request->all(), [
            'tgl_masuk' => 'required',
            'barang' => 'required',
            'jumlah' => 'required',
            'supplier' => 'required',
        ], $pesanValidasi);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        } else {
            $data['kd_barangmasuk'] = $request->kd_barangmasuk;
            $data['tanggal_masuk'] = $request->tgl_masuk;
            $data['barang_id'] = $request->barang;
            $data['supplier_id'] = $request->supplier;

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

            Barangmasuk::whereId($id)->update($data);
        }

        return redirect()->route('barangmasuk')->with('success', 'Data barang masuk berhasil terubah!');;
    }

    public function delete_barangmasuk($id)
    {
        $data = Barangmasuk::find($id);
        $data->delete();
        return redirect()->route('barangmasuk')->with('success', 'Data barang berhasil terhapus!');;
    }
}
