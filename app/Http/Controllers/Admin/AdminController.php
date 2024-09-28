<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\JurusanController;
use Illuminate\Http\Request;

/**
 * Class AdminController
 * 
 * This class is used to handle the request from the admin.
 * 
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
    /**
     * Show the dashboard page for admin.
     * 
     * This function will show the dashboard page for the admin.
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function dashboard(DashboardController $dashboardController, Request $request)
    {
        return $dashboardController->dashboard($request);
    }

    /**
     * Generate a PDF of the registrations.
     * 
     * This function will generate a PDF of the registrations.
     * 
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function pdf(DataPesertaController $dataPesertaController, Request $request)
    {
        return $dataPesertaController->pdf($request);
    }

    /**
     * Import the CSV file.
     * 
     * This function will import the CSV file.
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function importCsv(DataPesertaController $dataPesertaController, Request $request)
    {
        return $dataPesertaController->importCsv($request);
    }

    /**
     * Show the detail page for a registration.
     * 
     * This function will show the detail page for a registration.
     * 
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function detailPeserta(DashboardController $dashboardController, Request $request, int $id)
    {
        return $dashboardController->detailPeserta($request, $id);
    }

    /**
     * Edit the detail page for a registration.
     * 
     * This function will edit the detail page for a registration.
     * 
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editDetailPeserta(DashboardController $dashboardController, Request $request, int $id)
    {
        return $dashboardController->editDetailPeserta($request, $id);
    }

    public function akun(AkunController $akunController, Request $request)
    {
        return $akunController->akun($request);
    }

    public function editAkun(AkunController $akunController, Request $request, int $id)
    {
        return $akunController->editAkun($request, $id);
    }

    /**
     * Show the pengumuman page for admin.
     * 
     * This function will show the pengumuman page for the admin.
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function pengumuman(PengumumanController $pengumumanController, Request $request)
    {
        return $pengumumanController->pengumuman($request);
    }

    /**
     * Add a pengumuman.
     * 
     * This function will add a pengumuman with the given data.
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function tambahPengumuman(PengumumanController $pengumumanController, Request $request)
    {
        return $pengumumanController->tambahPengumuman($request);
    }

    /**
     * Edit a pengumuman.
     * 
     * This function will edit a pengumuman with the given id.
     * 
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editPengumuman(PengumumanController $pengumumanController, Request $request, int $id)
    {
        return $pengumumanController->editPengumuman($request, $id);
    }

    /**
     * Delete a pengumuman.
     * 
     * This function will delete a pengumuman with the given id.
     * 
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function hapusPengumuman(PengumumanController $pengumumanController, Request $request, int $id)
    {
        return $pengumumanController->hapusPengumuman($id);
    }

    /**
     * Show the data peserta page for admin.
     * 
     * This function will show the data peserta page for the admin.
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function dataPeserta(DataPesertaController $dataPesertaController, Request $request)
    {
        return $dataPesertaController->dataPeserta($request);
    }

    /**
     * Add a peserta.
     * 
     * This function will add a peserta with the given data.
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function tambahPeserta(DataPesertaController $dataPesertaController, Request $request)
    {
        return $dataPesertaController->tambahPeserta($request);
    }

    /**
     * Process the adding of a peserta.
     * 
     * This function will process the adding of a peserta with the given data.
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function prosesTambahPeserta(DataPesertaController $dataPesertaController, Request $request)
    {
        return $dataPesertaController->prosesTambahPeserta($request);
    }

    /**
     * Edit a peserta.
     * 
     * This function will edit a peserta with the given id.
     * 
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function editPeserta(DataPesertaController $dataPesertaController, Request $request, int $id)
    {
        return $dataPesertaController->editPeserta($request, $id);
    }

    /**
     * Process the editing of a peserta.
     * 
     * This function will process the editing of a peserta with the given data.
     * 
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function prosesEditPeserta(DataPesertaController $dataPesertaController, Request $request, int $id)
    {
        return $dataPesertaController->prosesEditPeserta($request, $id);
    }

    /**
     * Delete a peserta.
     * 
     * This function will delete a peserta with the given id.
     * 
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function hapusPeserta(DataPesertaController $dataPesertaController, Request $request, int $id)
    {
        return $dataPesertaController->hapusPeserta($request, $id);
    }

    /**
     * Show the jurusan page for admin.
     * 
     * This function will show the jurusan page for the admin.
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function jurusan(JurusanController $jurusanController, Request $request)
    {
        return $jurusanController->jurusan($request);
    }

    /**
     * Add a jurusan.
     * 
     * This function will add a jurusan with the given data.
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function tambahJurusan(JurusanController $jurusanController, Request $request)
    {
        return $jurusanController->tambahJurusan($request);
    }

    /**
     * Edit a jurusan.
     * 
     * This function will edit a jurusan with the given id.
     * 
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editJurusan(JurusanController $jurusanController, Request $request, int $id)
    {
        return $jurusanController->editJurusan($request, $id);
    }

    /**
     * Delete a jurusan.
     * 
     * This function will delete a jurusan with the given id.
     * 
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function hapusJurusan(JurusanController $jurusanController, Request $request, int $id)
    {
        return $jurusanController->hapusJurusan($request, $id);
    }

    /**
     * Show the statistik page for admin.
     * 
     * This function will show the statistik page for the admin.
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function statistik(StatistikController $statistikController, Request $request)
    {
        return $statistikController->statistik($request);
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