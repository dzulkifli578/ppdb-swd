<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use App\Models\Jurusan;
use App\Models\Registrasi;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function biodataPeserta(Request $request)
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

    public function prosesBiodataPeserta(Request $request, int $id)
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

        if ($validate['jurusan_pertama_id'] === $validate['jurusan_kedua_id'])
            return redirect()->back()->with(['jurusan' => 'Jurusan pertama dan kedua tidak boleh sama.']);

        $registrasi = Registrasi::where("id", $id)->update($validate);

        if (!$registrasi)
            return redirect()->back()->with('gagal_edit', 'Gagal mengedit biodata peserta');

        return redirect()->back()->with('berhasil_edit', "Berhasil mengedit biodata peserta");
    }
}
