<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlamatPengiriman extends Model
{
    protected $table = 'alamat_pengiriman';

    protected $fillable = [
        'user_id',
        'nama_depan',
        'nama_belakang',
        'perusahaan',
        'alamat1',
        'alamat2',
        'kota',
        'provinsi',
        'kode_pos',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
