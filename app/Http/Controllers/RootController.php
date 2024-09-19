<?php

namespace App\Http\Controllers;

class RootController extends Controller
{
    /**
     * Show the beranda page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function beranda()
    {
        return view("beranda");
    }

    /**
     * Show the program keahlian page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function programKeahlian()
    {
        return view("program-keahlian");
    }

    /**
     * Show the informasi PPDB page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function informasiPpdb()
    {
        return view("informasi-ppdb");
    }

    /**
     * Show the formulir pendaftaran page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function formulirPendaftaran()
    {
        return view("formulir-pendaftaran");
    }

    /**
     * Process the registration form.
     *
     * @todo Implement the logic to process the registration form.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function prosesFormulirPendaftaran()
    {
        // todo implement the logic to process the registration form
        return null;
    }
}
