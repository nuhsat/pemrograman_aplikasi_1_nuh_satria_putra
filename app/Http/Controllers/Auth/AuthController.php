<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController
{
    public function login(Request $request) {
        if ($request->isMethod('post')) {
            $credetials = [
                'email' => $request->email,
                'password' => $request->password,
            ];
            if (! Auth::attempt($credetials)) {
                Session::flash('error', 'Email atau Password Salah');
                return redirect('/');    
            }
            return redirect('note');
        } else {
            return view("auth.login");
        }
    }

    public function register(Request $request) {
        if ($request->isMethod('post')) {
            $user = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            
            Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
            return redirect('login');
        } else {
            return view("auth.register");
        }
    }

    public function logout(Request $request) {
        return view("auth.logout");
    }
}
