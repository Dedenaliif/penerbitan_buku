<?php

namespace App\Http\Controllers;

use App\AlamatPenagihan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlamatPenagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('dashboard.alamat.alamat_penagihan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auth = User::where('id', Auth::id())->first();
        $alamat = AlamatPenagihan::where('user_id', Auth::id())->first();

        return view('dashboard.alamat.alamat_penagihan.index', compact('alamat','auth'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_depan'   => 'required|string|max:100',
            'nama_belakang'=> 'required|string|max:100',
            'perusahaan'   => 'nullable|string|max:150',
            'alamat1'      => 'required|string|max:255',
            'alamat2'      => 'nullable|string|max:255',
            'kota'         => 'required|string|max:100',
            'provinsi'     => 'required|string|max:100',
            'kode_pos'     => 'required|string|max:20',
            'no_hp'        => 'required|string|max:20',
            'email'        => 'required|email|max:150',
        ]);

        $validated['user_id'] = Auth::id();

        AlamatPenagihan::create($validated);

        return redirect('daftar-alamat')->with('success', 'Alamat penagihan berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AlamatPenagihan  $alamatPenagihan
     * @return \Illuminate\Http\Response
     */
    public function show(AlamatPenagihan $alamatPenagihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AlamatPenagihan  $alamatPenagihan
     * @return \Illuminate\Http\Response
     */
    public function edit(AlamatPenagihan $alamatPenagihan)
    {
        $auth = User::where('id', Auth::id())->first();
        $alamat = AlamatPenagihan::where('user_id', Auth::id())->firstOrFail();

        return view('dashboard.alamat.alamat_penagihan.index', compact('alamat','auth'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AlamatPenagihan  $alamatPenagihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama_depan'   => 'required|string|max:100',
            'nama_belakang'=> 'required|string|max:100',
            'perusahaan'   => 'nullable|string|max:150',
            'alamat1'      => 'required|string|max:255',
            'alamat2'      => 'nullable|string|max:255',
            'kota'         => 'required|string|max:100',
            'provinsi'     => 'required|string|max:100',
            'kode_pos'     => 'required|string|max:20',
            'no_hp'        => 'required|string|max:20',
            'email'        => 'required|email|max:150',
        ]);

        $alamat = AlamatPenagihan::where('user_id', Auth::id())->firstOrFail();
        $alamat->update($validated);

        return redirect()->back()->with('success', 'Alamat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AlamatPenagihan  $alamatPenagihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlamatPenagihan $alamatPenagihan)
    {
        //
    }
}
