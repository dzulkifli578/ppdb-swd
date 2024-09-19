<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Firebase\JWT\JWT;

class LoginController extends Controller
{
    /**
     * Show the login page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function login()
    {
        return view("login");
    }

    /**
     * Process the login form.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function prosesLogin()
    {
        // Validate the request
        $validator = validator(request([
            "username" => "required",
            "password" => "required"
        ]));

        if ($validator->fails())
            return redirect()->route("login")->with(["validator_fails" => $validator->errors()]);

        $account = Account::where("username", request("username"))->first();

        if (!$account)
            return redirect()->route("login")->with("akun_tidak_ditemukan", "Akun tidak ditemukan");

        if (!password_verify(request("password"), $account->password))
            return redirect()->route("login")->with("password_salah", "Kata sandi salah");

        $payload = [
            "username" => $account->username,
            "role" => $account->role
        ];

        $jwt = JWT::encode($payload, env("APP_KEY"), "HS256");
        $cookie = cookie("jwt", $jwt);

        return redirect()->route("admin-dashboard")->withCookie($cookie)->with("login_sukses", "Login berhasil!");
    }
}
