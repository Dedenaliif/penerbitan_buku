<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'penulis@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'penulis',
            'kategori_pendaftar' => 'CRP',
            'referensi_kontak' => 'Email',
            'nama_depan' => 'Deden',
            'nama_belakang' => 'Alif',
            'jenis_kelamin' => 'Laki-laki',
            'nomor_handphone' => '08987148799',
            'pekerjaan' => 'Mahasiswa',
            'instansi_perusahaan' => 'UNIBI',
            'alamat' => 'Bandung'
        ]);

        User::create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
            'kategori_pendaftar' => 'CRP',
            'referensi_kontak' => 'Email',
            'nama_depan' => 'Deden',
            'nama_belakang' => 'Alif',
            'jenis_kelamin' => 'Laki-laki',
            'nomor_handphone' => '08987148799',
            'pekerjaan' => 'Mahasiswa',
            'instansi_perusahaan' => 'UNIBI',
            'alamat' => 'Bandung'
        ]);
    }
}
