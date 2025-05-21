<?php

namespace App\Http\Controllers;

use App\Naskah;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NaskahController extends Controller
{
    public function index()
    {
        $naskahs = Naskah::with(['penulis', 'reviewers'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        $auth = User::where('id', Auth::id())->first();

            // dd($id);

        return view('dashboard.naskahbuku', compact('naskahs','auth'));
    }

    public function create()
    {
        $auth = User::where('id', Auth::id())->first();

        return view('dashboard.nashkahbuku_add', compact('auth'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'topik_id' => 'required|string',
            'sinopsis' => 'required|string',
            'file_naskah' => 'required|mimes:doc,docx|max:49152', // 48MB
            'link_cover' => 'nullable|url',
            'penulis' => 'required|array|min:1',
            'penulis.*.nama' => 'required|string|max:255',
            'penulis.*.email' => 'required|email',
            'penulis.*.afiliasi' => 'required|string|max:255',
            'reviewer' => 'nullable|array',
            'reviewer.*.nama' => 'nullable|string|max:255',
            'reviewer.*.email' => 'nullable|string|max:255',
            'reviewer.*.afiliasi' => 'nullable|string|max:255',
        ]);

        // Simpan file naskah
        $filePath = $request->file('file_naskah')->store('naskah', 'public');

        $id = Auth::id();

        // Simpan data naskah dengan user_id
        $naskah = Naskah::create([
            'user_id' => $id, // ← inilah pengait user
            'judul' => $validated['judul'],
            'topik_id' => $validated['topik_id'],
            'sinopsis' => $validated['sinopsis'],
            'file_naskah' => $filePath,
            'link_cover' => $validated['link_cover'] ?? null,
        ]);

        // Simpan data penulis
        foreach ($validated['penulis'] as $penulis) {
            $naskah->penulis()->create($penulis);
        }

        // Simpan data reviewer jika ada
        if (!empty($validated['reviewer'])) {
            foreach ($validated['reviewer'] as $reviewer) {
                if ($reviewer['nama'] || $reviewer['email'] || $reviewer['afiliasi']) {
                    $naskah->reviewers()->create($reviewer);
                }
            }
        }

        return redirect('naskah-buku')->with('success', 'Naskah berhasil dibuat');
    }

    public function show(Naskah $Naskah)
    {
        //
    }

    public function edit(Naskah $Naskah)
    {
        //
    }

    public function update(Request $request, Naskah $Naskah)
    {
        //
    }

    public function destroy(Naskah $naskah)
    {
        if ($naskah->file_naskah && Storage::disk('public')->exists($naskah->file_naskah)) {
            Storage::disk('public')->delete($naskah->file_naskah);
        }

        $naskah->penulis()->delete();
        $naskah->reviewers()->delete();
        $naskah->delete();

        return redirect('/naskah-buku')->with('success', 'Naskah berhasil dihapus');
    }

}
