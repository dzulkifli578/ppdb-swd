<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\Registrasi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $registrasi = Registrasi::where("akun_id", session("id"))->first();

        return view("peserta.dashboard", compact("registrasi"));
    }
}
