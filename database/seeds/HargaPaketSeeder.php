<?php

use App\HargaPaket;
use Illuminate\Database\Seeder;

class HargaPaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HargaPaket::create([
            'nama_paket' => 'Motekar Dasar',
            'instansi' => 'Sivitas',
            'harga' => '1000000'
        ]);

        HargaPaket::create([
            'nama_paket' => 'Motekar Dasar',
            'instansi' => 'Nonsivitas',
            'harga' => '1250000'
        ]);

        HargaPaket::create([
            'nama_paket' => 'Motekar Kombo I',
            'instansi' => 'Sivitas',
            'harga' => '1500000'
        ]);

        HargaPaket::create([
            'nama_paket' => 'Motekar Kombo I',
            'instansi' => 'Nonsivitas',
            'harga' => '2000000'
        ]);

        HargaPaket::create([
            'nama_paket' => 'Motekar Kombo II',
            'instansi' => 'Sivitas',
            'harga' => '2500000'
        ]);

        HargaPaket::create([
            'nama_paket' => 'Motekar Kombo II',
            'instansi' => 'Nonsivitas',
            'harga' => '2700000'
        ]);
    }
}
