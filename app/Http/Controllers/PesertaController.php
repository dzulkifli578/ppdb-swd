<?php

namespace App\Http\Controllers;
use App\Models\Agama;
use App\Models\Jurusan;
use App\Models\Pengumuman;
use App\Models\Registrasi;

/**
 * Class PesertaController
 * 
 * This class is used to handle the request from the peserta.
 * 
 * @package App\Http\Controllers
 */
class PesertaController extends Controller
{
    /**
     * Show the dashboard page for peserta.
     *
     * This function will show the dashboard page for the peserta.
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function dashboard()
    {
        return view("peserta.dashboard");
    }

    /**
     * Show the biodata page for peserta.
     *
     * This function will show the biodata page for the peserta.
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function biodataPeserta()
    {
        $registrasi = Registrasi::join("jurusan as jurusan_pertama", "jurusan_pertama_id", "jurusan_pertama.id")
            ->join("jurusan as jurusan_kedua", "jurusan_kedua_id", "jurusan_kedua.id")
            ->join("agama", "agama_id", "agama.id")
            ->select("registrasi.*")
            ->where("akun_id", session("id"))
            ->first();

        $agama = Agama::all();
        $jurusan = Jurusan::all();
        return view("peserta.biodata", compact("agama", "registrasi", "jurusan"));
    }

    /**
     * Process the biodata page for peserta.
     *
     * This function will process the biodata page for the peserta.
     * 
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function prosesBiodataPeserta($id)
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

        if ($validate['jurusan_pertama_id'] === $validate['jurusan_kedua_id'])
            return redirect()->back()->withErrors(['jurusan' => 'Jurusan pertama dan kedua tidak boleh sama.']);

        $registrasi = Registrasi::where("id", $id)->update($validate);

        if (!$registrasi)
            return redirect()->back()->withErrors(['gagal' => 'Data gagal disimpan.']);

        return redirect()->back()->with("success", "Data berhasil disimpan.");
    }

    /**
     * Show the status penerimaan page for peserta.
     * 
     * This function will show the status penerimaan page for the peserta.
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function statusPenerimaanPeserta()
    {
        $registrasi = Registrasi::join("jurusan", "jurusan_diterima_id", "jurusan.id")
            ->select("status", "jurusan.nama as jurusan")
            ->where("akun_id", session("id"))
            ->first();

        return view("peserta.status-penerimaan", compact("registrasi"));
    }

    /**
     * Show the pengumuman page for peserta.
     * 
     * This function will show the pengumuman page for the peserta.
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function pengumumanPeserta()
    {
        $pengumuman = Pengumuman::join("akun", "penerima_id", "akun.id")
            ->select("pengumuman.*")
            ->where("akun.id", session("id"))
            ->get();

        return view("peserta.pengumuman", compact("pengumuman"));
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