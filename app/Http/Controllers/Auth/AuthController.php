<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    // =========================
    // HALAMAN LOGIN
    // =========================
    public function login()
    {

        // Kalau sudah login
        if(Auth::check()){

            // Role Admin
            if(Auth::user()->role == 'admin'){

                return redirect('/admin')
                ->with('success',
                'Selamat datang '.Auth::user()->name.
                ', anda berhasil login sebagai Admin 🎉');

            }

            // Role User
            elseif(Auth::user()->role == 'user'){

                return redirect('/attendance')
                ->with('success',
                'Selamat datang '.Auth::user()->name.
                ', anda berhasil login sebagai User 🎉');

            }

        }

        // Tampilkan halaman login
        return view('auth.login');

    }


    // =========================
    // PROSES LOGIN
    // =========================
    public function actionLogin(Request $request)
    {

        $credential = $request->validate([

            'email' => 'required|email',
            'password' => 'required'

        ]);

        // Cek login
        if(Auth::attempt($credential)){

            // Admin
            if(Auth::user()->role == 'admin'){

                return redirect('/admin')
                ->with('success',
                'Selamat datang '.Auth::user()->name.
                ', anda berhasil login sebagai Admin 🎉');

            }

            // User
            elseif(Auth::user()->role == 'user'){

                return redirect('/attendance')
                ->with('success',
                'Selamat datang '.Auth::user()->name.
                ', anda berhasil login sebagai User 🎉');

            }

        }

        // Login gagal
        return redirect()->back()
        ->with('error',
        'Email atau Password salah ❌');

    }


    // =========================
    // LOGOUT
    // =========================
    public function logout()
    {

        Auth::logout();

        return redirect('/')
        ->with('success',
        'Berhasil logout 👋');

    }

}