<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlamatPenagihan;
use App\AlamatPengiriman;
use App\User;
use Illuminate\Support\Facades\Auth;

class AlamatController extends Controller
{
    public function index()
{
    $auth = User::where('id', Auth::id())->first();
    $alamatPenagihan = AlamatPenagihan::where('user_id', auth()->id())->first();
    $alamatPengiriman = AlamatPengiriman::where('user_id', auth()->id())->first();
    // dd($alamatPenagihan);// relasi atau query ke model

    return view('dashboard.alamat.index', compact('alamatPenagihan','alamatPengiriman','auth'));
}
}
