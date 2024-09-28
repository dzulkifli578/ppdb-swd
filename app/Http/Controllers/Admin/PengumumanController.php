<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Akun;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Show the pengumuman page for admin.
     * 
     * This function will show the pengumuman page for the admin.
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function pengumuman(Request $request)
    {
        $header = [
            'name' => 'Pengumuman',
            'breadcrumbs' => 'Pengumuman',
            'route' => route('admin-pengumuman')
        ];

        $pengumuman = Pengumuman::leftJoin("akun", "penerima_id", "akun.id")
            ->select("pengumuman.*", "akun.nama_pengguna as penerima")
            ->orderBy("id")
            ->get();

        $akun = Akun::all();

        return view("admin.pengumuman.pengumuman", compact("header", "pengumuman", "akun"));
    }

    /**
     * Tambah a pengumuman.
     * 
     * This function will add a pengumuman with the given data.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function tambahPengumuman(Request $request)
    {
        $validate = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tipe' => 'required',
            'penerima_id' => 'required_if:tipe,privat'
        ]);

        $pengumuman = Pengumuman::insert($validate);

        if (!$pengumuman)
            return redirect()->back()->with('gagal_tambah', 'Gagal menambahkan data pengumuman');

        return redirect()->back()->with('berhasil_tambah', 'Berhasil menambahkan data pengumuman');
    }

    /**
     * Edit a pengumuman.
     * 
     * This function will edit a pengumuman with the given id.
     * 
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editPengumuman(Request $request, int $id)
    {
        $validate = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tipe' => 'required',
            'penerima_id' => 'required_if:tipe,privat'
        ]);

        $pengumuman = Pengumuman::where('id', $id)->update($validate);

        if (!$pengumuman)
            return redirect()->back()->with('gagal_edit', 'Gagal mengedit data pengumuman');

        return redirect()->back()->with('berhasil_edit', 'Berhasil mengedit data pengumuman');
    }

    public function hapusPengumuman(int $id)
    {
        $pengumuman = Pengumuman::find($id)->delete();

        if (!$pengumuman)
            return redirect()->back()->with('gagal_hapus', 'Gagal menghapus data pengumuman');

        return redirect()->back()->with('berhasil_hapus', 'Berhasil menghapus data pengumuman');
    }
}