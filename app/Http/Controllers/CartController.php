<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Models\User;
use App\AlamatPenagihan;
use App\HargaPaket;

class CartController extends Controller
{
    /**
     * Tampilkan halaman keranjang.
     */
    public function index()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();
        // dd($cartItems);
        $alamat = AlamatPenagihan::where('user_id', $user->id)->first();
        $subtotal = $cartItems->sum('total_harga');

        if (!$alamat) {
            return redirect()->route('alamat-penagihan.form')
                ->with('error', 'Silakan mengisi alamat penagihan terlebih dahulu.');
        }

        return view('content.paket_penerbitan.cart', [
            'cart' => $cartItems,
            'alamat' => $alamat,
            'auth' => $user,
            'subtotal' => $subtotal
        ]);
    }

    /**
     * Simpan data paket yang dipilih ke keranjang.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_paket' => 'required|string',
            'instansi' => 'required|string|in:Sivitas,Nonsivitas',
            'jumlah_halaman' => 'required|integer|min:1',
        ]);

        $hargaPaket = HargaPaket::where('instansi', $validated['instansi'])
            ->where('nama_paket', $validated['nama_paket'])
            ->first();

        if (!$hargaPaket) {
            return back()->with('error', 'Paket tidak ditemukan.');
        }

        // Hitung total harga
        $biayaInstansi = $validated['instansi'] === 'Sivitas' ? 200000 : 500000;
        $halamanTambahan = max(0, ceil(($validated['jumlah_halaman'] - 100) / 100));
        $biayaHalaman = $halamanTambahan * 200000;
        $totalHarga = $hargaPaket->harga + $biayaInstansi + $biayaHalaman;

        // Simpan ke database
        Cart::create([
            'user_id' => Auth::id(),
            'nama_paket' => $validated['nama_paket'],
            'instansi' => $validated['instansi'],
            'jumlah_halaman' => $validated['jumlah_halaman'],
            'total_harga' => $totalHarga
        ]);

        return redirect()->route('cart.index')->with('success', 'Paket berhasil ditambahkan ke keranjang.');
    }

    /**
     * Hapus satu item dari keranjang berdasarkan ID.
     */
    public function destroy($id)
    {
        $cart = Cart::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'Item dihapus dari keranjang.');
    }

    /**
     * Checkout: hapus semua item keranjang pengguna.
     */
    public function checkout()
    {
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('cart.index')->with('success', 'Checkout berhasil.');
    }
}
