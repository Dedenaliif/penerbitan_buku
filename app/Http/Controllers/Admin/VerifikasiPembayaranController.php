<?php

namespace App\Http\Controllers\Admin;

use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class VerifikasiPembayaranController extends Controller
{
    public function index() {

        $auth = User::where('id', Auth::id())->first();
        $cart = Cart::with('user')->get();

        return view('admin.dashboard.verifikasi_pembayaran', compact('auth','cart'));
    }

    public function setujui($id)
    {
        $naskah = Cart::findOrFail($id);
        $naskah->status = 'disetujui';
        $naskah->save();

        return redirect()->back()->with('success', 'Pembayaran disetujui.');
    }

    public function tolak($id)
    {
        $naskah = Cart::findOrFail($id);
        $naskah->status = 'ditolak';
        $naskah->save();

        return redirect()->back()->with('success', 'Pembayaran ditolak');
    }
}
