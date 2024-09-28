<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\Registrasi;
use Illuminate\Http\Request;

class StatusPenerimmanController extends Controller
{
    public function statusPenerimaanPeserta(Request $request)
    {
        $registrasi = Registrasi::join("jurusan", "jurusan_diterima_id", "jurusan.id")
            ->select("status", "jurusan.nama as jurusan")
            ->where("akun_id", session("id"))
            ->first();

        return view("peserta.status-penerimaan", compact("registrasi"));
    }
}
