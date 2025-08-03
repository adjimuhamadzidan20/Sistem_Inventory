<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function supplier()
    {
        $modelSupplier = new Supplier();
        $data = $modelSupplier->get();

        return view('halaman.data_supplier', [
            'title' => 'Supplier',
            'active' => 'Supplier',
            'supplier' => $data
        ]);
    }

    public function create_supplier()
    {
        $waktu = Carbon::now()->format('Y');
        $lastSupplier = Supplier::whereYear('created_at', $waktu)
            ->orderBy('kd_supplier', 'desc')
            ->first();

        if (!$lastSupplier) {
            $no = 1;
        } else {
            $lastNumber = (int) substr($lastSupplier->kd_supplier, -3);
            $no = $lastNumber + 1;
        }

        $kodeSupplier = 'SP-10' . $waktu . '-' . str_pad($no, 3, '0', STR_PAD_LEFT);
        return view('halaman.create.create_supplier', [
            'title' => 'Tambah Supplier',
            'active' => 'Supplier',
            'kode' => $kodeSupplier
        ]);
    }

    public function edit_supplier($id)
    {
        $data = Supplier::find($id);

        return view('halaman.edit.edit_supplier', [
            'title' => 'Edit Supplier',
            'active' => 'Supplier',
            'supplier' => $data
        ]);
    }

    public function create_supplier_proses(Request $request)
    {
        $pesanValidasi = [
            'nama_supplier.required' => 'Nama supplier tidak boleh kosong!',
            'nama_supplier.unique' => 'Nama supplier sudah ada!',
            'alamat.required' => 'Alamat tidak boleh kosong!',
            'telp.required' => 'Telp tidak boleh kosong!',
            'telp.unique' => 'Telp supplier sudah ada!'
        ];

        $validasi = Validator::make($request->all(), [
            'nama_supplier' => 'required|unique:suppliers,nama_supplier',
            'alamat' => 'required',
            'telp' => 'required|unique:suppliers,telepon',
        ], $pesanValidasi);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $data['kd_supplier'] = htmlspecialchars($request->kd_supplier);
        $data['nama_supplier'] = htmlspecialchars($request->nama_supplier);
        $data['alamat'] = htmlspecialchars($request->alamat);
        $data['telepon'] = htmlspecialchars($request->telp);

        Supplier::create($data);
        return redirect()->route('supplier')->with('success', 'Supplier berhasil ditambahkan!');
    }

    public function edit_supplier_proses(Request $request, $id)
    {
        $pesanValidasi = [
            'nama_supplier.required' => 'Nama supplier tidak boleh kosong!',
            'alamat.required' => 'Alamat tidak boleh kosong!',
            'telp.required' => 'Telp tidak boleh kosong!',
        ];

        $validasi = Validator::make($request->all(), [
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
        ], $pesanValidasi);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $data['kd_supplier'] = htmlspecialchars($request->kd_supplier);
        $data['nama_supplier'] = htmlspecialchars($request->nama_supplier);
        $data['alamat'] = htmlspecialchars($request->alamat);
        $data['telepon'] = htmlspecialchars($request->telp);

        Supplier::whereId($id)->update($data);
        return redirect()->route('supplier')->with('success', 'Supplier berhasil terubah!');
    }

    public function delete_supplier($id)
    {
        $data = Supplier::find($id);
        $data->delete();
        return redirect()->route('supplier')->with('success', 'Supplier berhasil terhapus!');
    }
}
