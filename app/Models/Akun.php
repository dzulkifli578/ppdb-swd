<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = 'akun';

    protected $fillable = [
        'nama_pengguna',
        'kata_sandi',
        'email',
        'peran'
    ];

    public $timestamps = true;
}
