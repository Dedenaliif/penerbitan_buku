<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'penulis') {
            return redirect('dashboard')->with('success','Login Berhasil');
        } else {
            return redirect('review-naskah')->with('success','Login Berhasil');
        }

    }

    public function profil()
    {
        // $auth = User::where('id', Auth::id())->first();
        return view('content.profil');
    }

    public function penerbitan_buku()
    {
        $auth = User::where('id', Auth::id())->first();
        return view('content.penerbitan_buku', compact('auth'));
    }
}
