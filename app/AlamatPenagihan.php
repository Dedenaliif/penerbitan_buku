<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlamatPenagihan extends Model
{
    protected $table = 'alamat_penagihan';

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
        'no_hp',
        'email',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
