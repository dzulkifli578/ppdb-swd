<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    protected $table = 'registrasi';

    protected $fillable = [
        'akun_id',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'asal_sekolah',
        'jurusan_pertama_id',
        'jurusan_kedua_id',
        'nama_ortu',
        'alamat_ortu',
        'pekerjaan_ortu',
        'no_telepon',
    ];

    public $timestamps = true;
}
