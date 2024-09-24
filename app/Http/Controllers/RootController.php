<?php

namespace App\Http\Controllers;
use App\Models\Jurusan;
use App\Models\Registrasi;

class RootController extends Controller
{
    /**
     * Show the beranda page.
     * 
     * This function will show the beranda page.
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
     * This function will show the program keahlian page.
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function programKeahlian()
    {
        $jurusan = Jurusan::all();
        return view("program-keahlian", compact("jurusan"));
    }

    /**
     * Show the informasi PPDB page.
     * 
     * This function will show the informasi PPDB page.
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
     * This function will show the formulir pendaftaran page.
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function formulirPendaftaran()
    {
        $jurusan = Jurusan::all();
        return view("formulir-pendaftaran", compact("jurusan"));
    }

    public function kontak()
    {
        return view("kontak");
    }

    /**
     * Process the registration form.
     * 
     * This function will validate and process the registration form.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function prosesFormulirPendaftaran()
    {
        $validate = request()->validate([
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

