<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barangkeluar;
use App\Models\Barangmasuk;
use App\Models\Kategori;
use App\Models\Satuan;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    public function profil()
    {
        $tabelUser = DB::table('users');
        $data = $tabelUser->where('name', auth()->user()->name)->first();

        return view('halaman.data_user', [
            'title' => 'Profil',
            'active' => 'Profil',
            'user' => $data
        ]);
    }

    public function profil_edit($id)
    {
        $data = User::find($id);

        return view('halaman.edit.edit_user', [
            'title' => 'Edit Profil',
            'active' => 'Profil',
            'user' => $data
        ]);
    }

    public function profil_edit_proses(Request $request, $id)
    {
        $pesanValidasi = [
            'nama.required' => 'Nama anda harus diisi!',
            'email.required' => 'Email harus diisi!',
            'jenis_kelamin.required' => 'Jenis kelamin harus dipilih!',
            'username.required' => 'Username harus diisi!',
        ];

        $validasi = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'username' => 'required',
        ], $pesanValidasi);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        } else {
            $data['name'] = $request->nama;
            $data['email'] = $request->email;
            $data['jenis_kelamin'] = $request->jenis_kelamin;
            $data['username'] = $request->username;

            User::whereId($id)->update($data);
            return redirect()->route('profil')->with('success', 'Data profil berhasil terubah!');;
        }
    }

    public function profil_edit_password($id)
    {
        $data = User::find($id);

        return view('halaman.edit.edit_user_pw', [
            'title' => 'Edit Profil',
            'active' => 'Profil',
            'user' => $data
        ]);
    }

    public function profil_editpw_proses(Request $request, $id)
    {
        $data = User::find($id);

        $pesanValidasi = [
            'pw_lama.required' => 'Password lama harus diisi!',
            'pw_baru.required' => 'Password baru harus diisi!'
        ];

        $validasi = Validator::make($request->all(), [
            'pw_lama' => 'required',
            'pw_baru' => 'required'
        ], $pesanValidasi);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        } else {
            if (Hash::check($request->pw_lama, $data->password)) {
                $passwordBaru = Hash::make($request->pw_baru);
                User::whereId($id)->update(['password' => $passwordBaru]);

                return redirect()->route('profil')->with('success', 'Password anda berhasil diganti!');
            } else {
                return redirect()->route('user_edit_pw', ['id' => $id])->with('failed', 'Password lama anda tidak cocok!');
            }
        }
    }
}
