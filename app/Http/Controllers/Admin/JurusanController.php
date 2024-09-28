<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Show the pengumuman page for admin.
     * 
     * This function will show the pengumuman page for the admin.
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function jurusan(Request $request)
    {
        $header = [
            'name' => 'Jurusan',
            'breadcrumbs' => 'Jurusan',
            'route' => route('admin-jurusan')
        ];

        $jurusan = Jurusan::all();

        return view("admin.jurusan.jurusan", compact("header", "jurusan"));
    }

    /**
     * Tambah a pengumuman.
     * 
     * This function will add a pengumuman with the given data.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function tambahJurusan(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|mimes:jpeg,jpg,png,gif',
        ]);

        $file = $request->file('gambar');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $path = 'img/jurusan';

        $file->move(public_path($path), $fileName);
        $relativePath = $path . '/' . $fileName;
        $validate['gambar'] = $relativePath;

        $jurusan = Jurusan::insert($validate);

        if (!$jurusan)
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
    public function editJurusan(Request $request, int $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png,gif'
        ]);

        $jurusan = Jurusan::find($id);

        if (!$jurusan)
            return redirect()->back()->with('gagal_edit', 'Jurusan tidak ditemukan');

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = 'img/jurusan';

            $file->move(public_path($path), $fileName);

            $relativePath = $path . '/' . $fileName;
            $validate['gambar'] = $relativePath;
        }

        $jurusan = Jurusan::find($id)->update($validate);

        if (!$jurusan)
            return redirect()->back()->with('gagal_edit', 'Gagal mengedit data jurusan');

        return redirect()->back()->with('berhasil_edit', 'Berhasil mengedit data jurusan');
    }

    public function hapusJurusan(Request $request, int $id)
    {
        $jurusan = Jurusan::find($id)->delete();

        if (!$jurusan)
            return redirect()->back()->with('gagal_hapus', 'Gagal menghapus data jurusan');

        return redirect()->back()->with('berhasil_hapus', 'Berhasil menghapus data jurusan');
    }
}
