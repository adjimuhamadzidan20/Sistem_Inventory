<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SatuanController extends Controller
{
    public function satuan()
    {
        $modelSatuan = new Satuan();
        $data = $modelSatuan->get();

        return view('halaman.data_satuan', [
            'title' => 'Satuan',
            'active' => 'Satuan',
            'satuan' => $data
        ]);
    }

    public function create_satuan()
    {
        return view('halaman.create.create_satuan', [
            'title' => 'Tambah Satuan',
            'active' => 'satuan',
        ]);
    }

    public function edit_satuan($id)
    {
        $data = Satuan::find($id);

        return view('halaman.edit.edit_satuan', [
            'title' => 'Edit Satuan',
            'active' => 'satuan',
            'satuan' => $data
        ]);
    }

    public function create_satuan_proses(Request $request)
    {
        $pesanValidasi = [
            'satuan.required' => 'Satuan tidak boleh kosong!'
        ];

        $validasi = Validator::make($request->all(), [
            'satuan' => 'required',
        ], $pesanValidasi);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $data['satuan'] = $request->satuan;
        Satuan::create($data);
        return redirect()->route('satuan');
    }

    public function edit_satuan_proses(Request $request, $id)
    {
        $pesanValidasi = [
            'satuan.required' => 'Satuan tidak boleh kosong!'
        ];

        $validasi = Validator::make($request->all(), [
            'satuan' => 'required',
        ], $pesanValidasi);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $data['satuan'] = $request->satuan;
        Satuan::whereId($id)->update($data);
        return redirect()->route('satuan');
    }

    public function delete_satuan($id)
    {
        $data = Satuan::find($id);
        $data->delete();
        return redirect()->route('satuan');
    }
}
