<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    // halaman regist (daftar)
    public function register()
    {
        return view('auth.register');
    }
    // proses regist (daftar)
    public function proses_register(Request $request)
    {
        $pesanValidasi = [
            'nama.required' => 'Nama anda harus diisi!',
            'nama.unique' => 'Nama sudah ada yang menggunakan!',
            'email.required' => 'Email harus diisi!',
            'jenis_kelamin.required' => 'Jenis kelamin harus dipilih!',
            'username.required' => 'Username harus diisi!',
            'username.unique' => 'Username sudah ada yang menggunakan!',
            'password.required' => 'Password harus diisi!',
            'password.min' => 'Password minimal 6 karakter!',
        ];

        $validasi = Validator::make($request->all(), [
            'nama' => 'required|unique:users,name',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6'
        ], $pesanValidasi);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        } else {
            $data['name'] = htmlspecialchars($request->nama);
            $data['email'] = htmlspecialchars($request->email);
            $data['jenis_kelamin'] = htmlspecialchars($request->jenis_kelamin);
            $data['username'] = htmlspecialchars($request->username);
            $data['password'] = Hash::make($request->password);

            User::create($data);
            return redirect()->route('login')->with('success', 'Register berhasil, silahkan untuk memulai login!');;
        }
    }
}
