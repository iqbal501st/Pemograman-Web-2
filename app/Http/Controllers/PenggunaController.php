<?php
namespace App\Http\Controllers;

class PenggunaController extends Controller
{
    public function showLogin()
    {
        // Ganti ini dengan pengalihan langsung ke halaman dasbor jika pengguna adalah user1
        if (auth()->check() && auth()->user()->id === 1) {
            return redirect()->route('pengguna.dashboard');
        }

        // Jika pengguna bukan user1, tampilkan formulir login
        return view('auth.login');
    }

    public function index()
    {
        return view('pengguna.dashboard');
    }
}
