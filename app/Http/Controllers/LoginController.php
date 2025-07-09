<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function proses_login(Request $request)
    {

        $pesanValidasi = [
            'username.required' => 'Username harus diisi!',
            'password.required' => 'Password harus diisi!'
        ];

        $validasi = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ], $pesanValidasi);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        } else {
            $data['username'] = $request->username;
            $data['password'] = $request->password;

            if (Auth::attempt($data)) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('login')->with('failed', 'Username atau password tidak valid!');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
