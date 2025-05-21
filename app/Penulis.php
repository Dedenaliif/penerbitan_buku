<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    protected $table = 'penulis';

    protected $fillable = ['nama', 'email', 'afiliasi'];

    public function naskah()
    {
        return $this->belongsTo(Naskah::class);
    }
}
