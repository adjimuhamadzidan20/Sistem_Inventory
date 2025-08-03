<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function kategori()
    {
        $modelKategori = new Kategori();
        $data = $modelKategori->get();

        return view('halaman.data_kategori', [
            'title' => 'Kategori',
            'active' => 'Kategori',
            'kategori' => $data
        ]);
    }

    public function create_kategori()
    {
        return view('halaman.create.create_kategori', [
            'title' => 'Tambah Kategori',
            'active' => 'Kategori',
        ]);
    }

    public function edit_kategori($id)
    {
        $data = Kategori::find($id);

        return view('halaman.edit.edit_kategori', [
            'title' => 'Edit Kategori',
            'active' => 'Kategori',
            'kategori' => $data
        ]);
    }

    public function create_kategori_proses(Request $request)
    {
        $pesanValidasi = [
            'kategori.required' => 'Kategori tidak boleh kosong!',
            'kategori.unique' => 'Kategori sudah ada!'
        ];

        $validasi = Validator::make($request->all(), [
            'kategori' => 'required|unique:kategoris,kategori',
        ], $pesanValidasi);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        } else {
            $data['kategori'] = htmlspecialchars($request->kategori);
            Kategori::create($data);
        }

        return redirect()->route('kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit_kategori_proses(Request $request, $id)
    {
        $pesanValidasi = [
            'kategori.required' => 'Kategori tidak boleh kosong!'
        ];

        $validasi = Validator::make($request->all(), [
            'kategori' => 'required',
        ], $pesanValidasi);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        } else {
            $data['kategori'] = htmlspecialchars($request->kategori);
            Kategori::whereId($id)->update($data);
        }

        return redirect()->route('kategori')->with('success', 'Kategori berhasil terubah!');
    }

    public function delete_kategori($id)
    {
        $data = Kategori::find($id);
        $data->delete();
        return redirect()->route('kategori')->with('success', 'Kategori berhasil terhapus!');
    }
}
