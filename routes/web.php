<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Peserta\PesertaController;
use App\Http\Controllers\RootController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\PeranMiddleware;
use App\Http\Middleware\PesertaMiddleware;
use App\Http\Middleware\TamuMiddleware;
use Illuminate\Support\Facades\Route;

// root
Route::prefix("/")->group(function () {
    Route::get("", [RootController::class, "beranda"])->name("beranda");
    Route::get("/program-keahlian", [RootController::class, "programKeahlian"])->name("program-keahlian");
    Route::get("/informasi-ppdb", [RootController::class, "informasiPpdb"])->name("informasi-ppdb");
    Route::get("/formulir-pendaftaran", [RootController::class, "formulirPendaftaran"])->name("formulir-pendaftaran");
    Route::post("/formulir-pendaftaran/proses", [RootController::class, "prosesFormulirPendaftaran"])->name("proses-formulir-pendaftaran");
    Route::get("/kontak", [RootController::class, "kontak"])->name("kontak");
    Route::get('/jembatan')->middleware(PeranMiddleware::class)->name("jembatan");
});

// login
Route::prefix("/login")->middleware(TamuMiddleware::class)->group(function () {
    Route::get("", [LoginController::class, "login"])->name("login");
    Route::post("/proses", [LoginController::class, "prosesLogin"])->name("proses-login");
});

// admin
Route::prefix("/peran/admin")->middleware(AdminMiddleware::class)->group(function () {
    // dashboard
    Route::get("/dashboard", [AdminController::class, "dashboard"])->name("admin-dashboard");
    Route::post("/logout", [AdminController::class, "logout"])->name("admin-logout");
    Route::post("/pdf", [AdminController::class, "pdf"])->name("pdf");

    // additional dashboard
    Route::prefix("/dashboard")->group(function () {
        Route::post("/import-csv", [AdminController::class, "importCsv"])->name("import-csv");
        Route::get("/detail/{id}", [AdminController::class, "detailPeserta"])->name("detail-peserta");
        Route::post("/detail/{id}", [AdminController::class, "editDetailPeserta"])->name("edit-detail-peserta");
        Route::post("/hapus/{id}", [AdminController::class, "hapusPeserta"])->name("hapus-peserta");
    });

    // akun
    Route::get("/akun", [AdminController::class, "akun"])->name("admin-akun");
    Route::put("/akun/edit/{id}", [AdminController::class, "editAkun"])->name("edit-akun");

    // pengumuman
    Route::get("/pengumuman", [AdminController::class, "pengumuman"])->name("admin-pengumuman");
    Route::post("/tambah-pengumuman", [AdminController::class, "tambahPengumuman"])->name("tambah-pengumuman");
    Route::put("/edit-pengumuman/{id}", [AdminController::class, "editPengumuman"])->name("edit-pengumuman");
    Route::delete("/hapus-pengumuman/{id}", [AdminController::class, "hapusPengumuman"])->name("hapus-pengumuman");

    // data peserta
    Route::get("/peserta", [AdminController::class, "dataPeserta"])->name("admin-data-peserta");
    Route::get("/tambah-peserta", [AdminController::class, "tambahPeserta"])->name("tambah-peserta");
    Route::post("/proses-tambah-peserta", [AdminController::class, "prosesTambahPeserta"])->name("proses-tambah-peserta");
    Route::get("/edit-peserta/{id}", [AdminController::class, "editPeserta"])->name("edit-peserta");
    Route::put("/proses-edit-peserta/{id}", [AdminController::class, "prosesEditPeserta"])->name("proses-edit-peserta");
    Route::delete("/hapus-peserta/{id}", [AdminController::class, "hapusPeserta"])->name("hapus-peserta");

    // jurusan
    Route::get("/jurusan", [AdminController::class, "jurusan"])->name("admin-jurusan");
    Route::post("/tambah-jurusan", [AdminController::class, "tambahJurusan"])->name("tambah-jurusan");
    Route::put("/edit-jurusan/{id}", [AdminController::class, "editJurusan"])->name("edit-jurusan");
    Route::delete("/hapus-jurusan/{id}", [AdminController::class, "hapusJurusan"])->name("hapus-jurusan");
});

// peserta
Route::prefix("/peran/peserta")->middleware(PesertaMiddleware::class)->group(function () {
    Route::get("/dashboard", [PesertaController::class, "dashboard"])->name("peserta-dashboard");
    Route::post("/logout", [PesertaController::class, "logout"])->name("peserta-logout");
    Route::get("/biodata/", [PesertaController::class, "biodataPeserta"])->name("peserta-biodata");
    Route::post("/biodata/proses/{id}", [PesertaController::class, "prosesBiodataPeserta"])->name("proses-biodata-peserta");
    Route::get("/status/", [PesertaController::class, "statusPenerimaanPeserta"])->name("peserta-status-penerimaan");
    Route::get("/pengumuman/", [PesertaController::class, "pengumuman"])->name("peserta-pengumuman");
});

// test
Route::get("/test", function () {
    return view("admin.data-peserta.pdf");
})->name("test");