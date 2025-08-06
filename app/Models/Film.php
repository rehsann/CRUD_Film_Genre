<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_film',
        'tahun_rilis',
        'genre_id',
        'deskripsi'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
