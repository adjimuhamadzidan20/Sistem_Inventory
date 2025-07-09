<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function proses_register(Request $request)
    {
        $pesanValidasi = [
            'nama.required' => 'Nama anda harus diisi!',
            'email.required' => 'Email harus diisi!',
            'jenis_kelamin.required' => 'Jenis kelamin harus dipilih!',
            'username.required' => 'Username harus diisi!',
            'password.required' => 'Password harus diisi!',
        ];

        $validasi = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'username' => 'required',
            'password' => 'required'
        ], $pesanValidasi);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        } else {
            $data['name'] = $request->nama;
            $data['email'] = $request->email;
            $data['jenis_kelamin'] = $request->jenis_kelamin;
            $data['username'] = $request->username;
            $data['password'] = Hash::make($request->password);

            User::create($data);
            return redirect()->route('login')->with('success', 'Register berhasil, silahkan untuk memulai login!');;
        }
    }
}
