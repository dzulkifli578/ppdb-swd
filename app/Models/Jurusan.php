<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';

    protected $fillable = [
        'nama',
        'deskripsi',
        'gambar'
    ];

    public $timestamps = true;
}
