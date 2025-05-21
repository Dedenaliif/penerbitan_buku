<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function updatePassword(Request $request)
    {
        dd('dasfd');
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama salah']);
        }

        $user = auth()->user();
        $user->password = Hash::make($request->password);
        $user->save();

        auth()->logout();

        return redirect()->route('login')->with('success', 'Password berhasil diubah, silakan login kembali.');
    }
}
