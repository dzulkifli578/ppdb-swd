<?php

namespace App\Http\Controllers\Peserta;
use App\Http\Controllers\Controller;
use App\Models\Agama;
use App\Models\Jurusan;
use App\Models\Pengumuman;
use App\Models\Registrasi;
use Illuminate\Http\Request;

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
    public function dashboard(DashboardController $dashboardController, Request $request)
    {
        return $dashboardController->dashboard($request);
    }

    /**
     * Show the biodata page for peserta.
     *
     * This function will show the biodata page for the peserta.
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function biodataPeserta(BiodataController $biodataController, Request $request)
    {
        return $biodataController->biodataPeserta($request);
    }

    /**
     * Process the biodata page for peserta.
     *
     * This function will process the biodata page for the peserta.
     * 
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function prosesBiodataPeserta(BiodataController $biodataController, Request $request, int $id)
    {
        return $biodataController->prosesBiodataPeserta($request, $id);
    }

    /**
     * Show the status penerimaan page for peserta.
     * 
     * This function will show the status penerimaan page for the peserta.
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function statusPenerimaanPeserta(StatusPenerimmanController $statusPenerimaanController, Request $request)
    {
        return $statusPenerimaanController->statusPenerimaanPeserta($request);
    }

    /**
     * Show the pengumuman page for peserta.
     * 
     * This function will show the pengumuman page for the peserta.
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function pengumuman(PengumumanController $pengumumanController, Request $request)
    {
        return $pengumumanController->pengumuman($request);
    }

    /**
     * Log out the user.
     * 
     * This function will delete the JWT cookie and flush the session. It will then redirect the user to the home page.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        $cookie = cookie("jwt", "", -1);
        session()->flush();

        return redirect()->route("beranda")->with("logout", "Anda berhasil logout")->withCookie($cookie);
    }
}