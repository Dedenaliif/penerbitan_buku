<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Naskah extends Model
{
    protected $fillable = ['user_id','judul', 'topik_id', 'sinopsis', 'file_naskah', 'link_cover'];

    public function penulis()
    {
        return $this->hasMany(Penulis::class);
    }

    public function reviewers()
    {
        return $this->hasMany(Reviewer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
