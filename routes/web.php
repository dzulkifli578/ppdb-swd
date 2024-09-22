<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesertaController;
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
});

// peserta
Route::prefix("/peran/peserta")->middleware(PesertaMiddleware::class)->group(function () {
    Route::get("/dashboard", [PesertaController::class, "dashboard"])->name("peserta-dashboard");
    Route::post("/logout", [PesertaController::class, "logout"])->name("peserta-logout");
    Route::get("/biodata/", [PesertaController::class, "biodataPeserta"])->name("biodata-peserta");
    Route::post("/biodata/proses/{id}", [PesertaController::class, "prosesBiodataPeserta"])->name("proses-biodata-peserta");
    Route::get("/status/", [PesertaController::class, "statusPenerimaanPeserta"])->name("status-penerimaan-peserta");
    Route::get("/pengumuman/", [PesertaController::class, "pengumumanPeserta"])->name("pengumuman-peserta");
});

// test
Route::get("/test", function () {
    return view("admin.pdf");
})->name("test");