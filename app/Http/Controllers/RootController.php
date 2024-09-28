<?php

namespace App\Http\Controllers;
use App\Models\Jurusan;
use App\Models\Registrasi;
use Illuminate\Http\Request;

/**
 * Class RootController
 * 
 * This class is used to handle the request from the root.
 * 
 * @package App\Http\Controllers
 */
class RootController extends Controller
{
    /**
     * Show the beranda page.
     * 
     * This function will show the beranda page.
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function beranda(Request $request)
    {
        return view("beranda");
    }

    /**
     * Show the program keahlian page.
     * 
     * This function will show the program keahlian page.
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function programKeahlian(Request $request)
    {
        $jurusan = Jurusan::all();
        return view("program-keahlian", compact("jurusan"));
    }

    /**
     * Show the informasi PPDB page.
     * 
     * This function will show the informasi PPDB page.
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function informasiPpdb(Request $request)
    {
        return view("informasi-ppdb");
    }

    /**
     * Show the formulir pendaftaran page.
     * 
     * This function will show the formulir pendaftaran page.
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function formulirPendaftaran(Request $request)
    {
        $jurusan = Jurusan::all();
        return view("formulir-pendaftaran", compact("jurusan"));
    }

    /**
     * Show the kontak page.
     * 
     * This function will show the kontak page.
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function kontak(Request $request)
    {
        return view("kontak");
    }

    /**
     * Process the registration form.
     * 
     * This function will validate and process the registration form.
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function prosesFormulirPendaftaran(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama_id' => 'required',
            'alamat' => 'required',
            'asal_sekolah' => 'required',
            'jurusan_pertama_id' => 'required',
            'jurusan_kedua_id' => 'required',
            'nama_ortu' => 'required',
            'alamat_ortu' => 'required',
            'pekerjaan_ortu' => 'required',
            'no_telepon' => 'required',
        ]);

        $registrasi = Registrasi::insert($validate);

        if (!$registrasi)
            return redirect()->back()->with('failed', 'Data gagal disimpan!');

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}

