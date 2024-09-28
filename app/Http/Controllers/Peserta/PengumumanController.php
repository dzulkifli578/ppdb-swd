<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function pengumuman(Request $request)
    {
        $pengumuman = Pengumuman::join("akun", "penerima_id", "akun.id")
        ->select("pengumuman.*")
        ->where("akun.id", session("id"))
        ->get();

        return view("peserta.pengumuman", compact("pengumuman"));
    }
}
