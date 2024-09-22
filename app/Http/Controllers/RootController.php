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
        return view("program-keahlian");
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

    /**
     * Process the registration form.
     * 
     * This function will validate and process the registration form.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function prosesFormulirPendaftaran()
    {
        request()->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'agama' => 'required|string',
            'alamat' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'jurusan_pertama_id' => 'required|string',
            'jurusan_kedua_id' => 'required|string',
            'nama_ortu' => 'required|string|max:255',
            'alamat_ortu' => 'required|string|max:255',
            'pekerjaan_ortu' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
        ]);

        $registrasi = Registrasi::insert([
            'nama' => request()->nama,
            'tempat_lahir' => request()->tempat_lahir,
            'tanggal_lahir' => request()->tanggal_lahir,
            'jenis_kelamin' => request()->jenis_kelamin,
            'agama' => request()->agama,
            'alamat' => request()->alamat,
            'asal_sekolah' => request()->asal_sekolah,
            'jurusan_pertama_id' => request()->jurusan_pertama_id,
            'jurusan_kedua_id' => request()->jurusan_kedua_id,
            'nama_ortu' => request()->nama_ortu,
            'alamat_ortu' => request()->alamat_ortu,
            'pekerjaan_ortu' => request()->pekerjaan_ortu,
            'no_telepon' => request()->no_telepon,
        ]);

        if (!$registrasi)
            return redirect()->back()->with('failed', 'Data gagal disimpan!');

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}

