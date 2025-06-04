<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function profil() {
        $auth = User::where('id', Auth::id())->first();

        return view('content.profil', compact('auth'));
    }

    public function penerbitan_buku() {
        $auth = User::where('id', Auth::id())->first();

        return view('content.penerbitan_buku', compact('auth'));
    }

    public function dashboard() {
        $auth = User::where('id', Auth::id())->first();
        return view('dashboard.index', compact('auth'));
    }

    public function home() {
        $auth = User::where('id', Auth::id())->first();
        return view('content.home', compact('auth'));
    }

    public function ubah_password() {
        $auth = User::where('id', Auth::id())->first();
        return view('dashboard.reset_password.index', compact('auth'));
    }

    public function detail_buku()
    {
        $auth = User::where('id', Auth::id())->first();
        return view('content.detail_buku', compact('auth'));
    }

    public function detail_buku_get()
    {
        return redirect('detail_buku');
    }


}
