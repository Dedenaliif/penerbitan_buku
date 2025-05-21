<?php

namespace App\Http\Controllers;

use App\HargaPaket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HargaPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = User::where('id', Auth::id())->first();
        $dasar = HargaPaket::where('nama_paket','Motekar Dasar')->get();
        $kombo1 = HargaPaket::where('nama_paket','Motekar Kombo I')->get();
        $kombo2 = HargaPaket::where('nama_paket','Motekar Kombo II')->get();
        // dd($kombo1);

        return view('content.paket_penerbitan.index', compact('dasar','kombo1','kombo2','auth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HargaPaket  $hargaPaket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auth = User::where('id', Auth::id())->first();
        $paket = HargaPaket::findOrFail($id);

        return view('content.paket_penerbitan.detail', compact('paket','auth'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HargaPaket  $hargaPaket
     * @return \Illuminate\Http\Response
     */
    public function getHarga(Request $request)
    {
        $instansi = $request->instansi;
        $nama_paket = $request->nama_paket;
        $jumlah_halaman = (int) $request->jumlah_halaman;

        $hargaPaket = HargaPaket::where('instansi', $instansi)
            ->where('nama_paket', $nama_paket)
            ->first();

        if ($hargaPaket) {
            $biayaInstansi = ($instansi === 'Sivitas') ? 200000 : 500000;

            // Hitung biaya halaman: setiap 100 halaman di atas 100 → +200rb
            $halamanTambahan = max(0, ceil(($jumlah_halaman - 100) / 100));
            $biayaHalaman = $halamanTambahan * 200000;

            $totalHarga = $hargaPaket->harga + $biayaInstansi + $biayaHalaman;

            return response()->json([
                'success' => true,
                'harga_dasar' => $hargaPaket->harga,
                'biaya_instansi' => $biayaInstansi,
                'biaya_halaman' => $biayaHalaman,
                'total_harga' => $totalHarga,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Paket tidak ditemukan untuk pilihan tersebut.',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HargaPaket  $hargaPaket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HargaPaket $hargaPaket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HargaPaket  $hargaPaket
     * @return \Illuminate\Http\Response
     */
    public function destroy(HargaPaket $hargaPaket)
    {
        //
    }
}
