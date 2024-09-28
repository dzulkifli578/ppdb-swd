<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Akun;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    /**
     * Show the akun page.
     * 
     * This function will show the akun page.
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function akun(Request $request)
    {
        $header = [
            'name' => 'Akun',
            'breadcrumbs' => 'Akun',
            'route' => route('admin-akun')
        ];

        $akun = Akun::find(session("id"))->first();

        return view("admin.akun.akun", compact("header", "akun"));
    }

    /**
     * Edit the akun.
     * 
     * This function will edit the akun.
     * 
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editAkun(Request $request, int $id)
    {
        $validate = $request->validate([
            'nama_pengguna' => 'required',
            'email' => 'required'
        ]);

        $akun = Akun::find($id);

        if (!$akun)
            return redirect()->back()->with('tidak_ditemukan', 'Akun tidak ditemukan');

        if ($request->filled('kata_sandi'))
            $validate['kata_sandi'] = password_hash($request->kata_sandi, PASSWORD_ARGON2I);

        $akun->update($validate);

        return redirect()->back()->with('sukses', 'Berhasil mengedit akun');
    }
}
