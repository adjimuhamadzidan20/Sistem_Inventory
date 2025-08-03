<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Models\ResetTokenPass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    // login admin
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
            $data['username'] = htmlspecialchars($request->username);
            $data['password'] = htmlspecialchars($request->password);

            // remember me
            $remember = $request->get('remember');
            if ($remember) {
                setcookie('USER', $data['username'], time() + 60, '/');
                setcookie('KEY', hash('sha256', $data['username']), time() + 60, '/');
            }

            if (Auth::attempt($data)) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('login')->with('failed', 'Username atau password tidak valid!');
            }
        }
    }

    // lupa password admin
    public function lupa_password()
    {
        return view('auth.forgot');
    }
    public function lupa_password_proses(Request $request)
    {
        $pesanValidasi = [
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Email anda tidak valid!',
            'email.exists' => 'Email anda tidak ditemukan!'
        ];

        $request->validate([
            'email' => 'required|email|exists:users,email'
        ], $pesanValidasi);

        // input data ke tb password reset tokens
        $token = Str::random(60);
        ResetTokenPass::updateOrCreate(
            [
                'email' => $request->email
            ],
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => now()
            ]
        );

        // kirim ke mail/mailtrap
        Mail::to($request->email)->send(new ForgotPasswordMail($token));
        return redirect()->route('forgot')->with('success', 'Email berhasil terkirim!');
    }
    public function validasi_password(Request $request, $token)
    {
        $getToken = ResetTokenPass::where('token', $token)->first();

        if (!$getToken) {
            return redirect()->route('login')->with('failed', 'Token tidak valid!');
        }

        return view('mail.validasi_token_pass', compact('token'));
    }
    public function validasi_proses(Request $request)
    {
        $pesanValidasi = [
            'password_baru.required' => 'Password tidak boleh kosong',
            'password_baru.min'      => 'Password minimal 6 karakter',
        ];

        $request->validate([
            'password_baru' => 'required|min:6'
        ], $pesanValidasi);

        // mengambil data token
        $token = ResetTokenPass::where('token', $request->token)->first();
        if (!$token) {
            return redirect()->route('login')->with('failed_validation', 'Token tidak valid!');
        }

        $user = User::where('email', $token->email)->first();
        if (!$user) {
            return redirect()->route('login')->with('failed_validation', 'Email tidak terdaftar di database!');
        } else {
            $user->update([
                'password' => Hash::make($request->password_baru)
            ]);
        }

        $token->delete();
        return redirect()->route('login')->with('success_validation', 'Password berhasil terubah!');
    }

    // logout admin
    public function logout()
    {
        Auth::logout();

        setcookie('USER', '', time() - 3600, '/');
        setcookie('KEY', '', time() - 3600, '/');

        return redirect()->route('login');
    }
}
