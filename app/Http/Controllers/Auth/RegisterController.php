<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User as AppUser;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'kategori_pendaftar' => ['required', 'in:CRP,Umum'],
            'referensi_kontak' => ['required', 'in:Email,Nomor Telepon'],
            'nama_depan' => ['required', 'string', 'max:50'],
            'nama_belakang' => ['required', 'string', 'max:50'],
            'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
            'nomor_handphone' => ['required', 'string', 'max:13'],
            'pekerjaan' => ['nullable', 'string', 'max:30'],
            'instansi_perusahaan' => ['nullable', 'string', 'max:30'],
            'alamat' => ['required', 'string'],
        ]);
    }

    protected function create(array $data)
    {
        return AppUser::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'kategori_pendaftar' => $data['kategori_pendaftar'],
            'referensi_kontak' => $data['referensi_kontak'],
            'nama_depan' => $data['nama_depan'],
            'nama_belakang' => $data['nama_belakang'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'nomor_handphone' => $data['nomor_handphone'],
            'pekerjaan' => $data['pekerjaan'] ?? null,
            'instansi_perusahaan' => $data['instansi_perusahaan'] ?? null,
            'alamat' => $data['alamat'],
        ]);
    }
}
