<?php

namespace App\Http\Controllers;

class PesertaController extends Controller
{
    /**
     * Show the dashboard page for peserta.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function dashboard()
    {
        return view("peserta.dashboard");
    }

    /**
     * Log out the user.
     *
     * This function will delete the JWT cookie and flush the session. It will then redirect the user to the home page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        $cookie = cookie("jwt", "", -1);
        session()->flush();

        return redirect()->route("beranda")->with("logout", "Anda berhasil logout")->withCookie($cookie);
    }
}
