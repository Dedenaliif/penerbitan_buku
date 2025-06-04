<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Naskah;

class ReviewNaskahController extends Controller
{
    public function index() {
        $auth = User::where('id', Auth::id())->first();
        $naskahs = Naskah::get();

        return view('admin.dashboard.review_naskah', compact('auth','naskahs'));
    }

    public function setujui($id)
    {
        $naskah = Naskah::findOrFail($id);
        $naskah->status = 'disetujui';
        $naskah->save();

        return redirect()->back()->with('success', 'Naskah disetujui.');
    }

    public function tolak($id)
    {
        $naskah = Naskah::findOrFail($id);
        $naskah->status = 'ditolak';
        $naskah->save();

        return redirect()->back()->with('success', 'Naskah ditolak');
    }

}
