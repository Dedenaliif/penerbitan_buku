<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id', 'nama_paket', 'instansi', 'jumlah_halaman', 'total_harga'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
