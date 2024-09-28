<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Show the login page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function login(Request $request)
    {
        return view("login");
    }

    /**
     * Process the login form.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function prosesLogin(Request $request)
    {
        $validate = $request->validate([
            'nama_pengguna' => 'required',
            'kata_sandi' => 'required'
        ]);
        
        $akun = Akun::where("nama_pengguna", request("nama_pengguna"))->first();
    
        if (!$akun)
            return redirect()->route("login")->with("akun_tidak_ditemukan", "Akun tidak ditemukan");
    
        if (!password_verify(request("kata_sandi"), $akun->kata_sandi))
            return redirect()->route("login")->with("password_salah", "Kata sandi salah");
    
        $payload = [
            "id" => $akun->id,
            "nama_pengguna" => $akun->nama_pengguna,
            "peran" => $akun->peran
        ];
    
        $jwt = JWT::encode($payload, env("APP_KEY"), "HS384");
        $cookie = cookie("jwt", $jwt);
    
        return redirect()->route("jembatan")->withCookie($cookie)->with("login_sukses", "Login berhasil!");
    }    
}
