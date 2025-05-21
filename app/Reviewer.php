<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
    protected $fillable = ['nama', 'email', 'afiliasi'];

    public function naskah()
    {
        return $this->belongsTo(Naskah::class);
    }
}
