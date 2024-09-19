<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\RootController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\PesertaMiddleware;
use Illuminate\Support\Facades\Route;

Route::prefix("/")->group(function () {
    Route::get("/", [RootController::class, "beranda"])->name("beranda");
    Route::get("/program-keahlian", [RootController::class, "programKeahlian"])->name("program-keahlian");
    Route::get("/informasi-ppdb", [RootController::class, "informasiPpdb"])->name("informasi-ppdb");
    Route::get("/formulir-pendaftaran", [RootController::class, "formulirPendaftaran"])->name("formulir-pendaftaran");
    Route::post("/formulir-pendaftaran/proses", [RootController::class, "prosesFormulirPendaftaran"])->name("proses-formulir-pendaftaran");
});

// logout
Route::prefix("/login")->middleware(GuestMiddleware::class)->group(function () {
    Route::get("", [LoginController::class, "login"])->name("login");
    Route::post("/proses", [LoginController::class, "prosesLogin"])->name("proses-login");
});

// admin
Route::prefix("/role/admin")->middleware(AdminMiddleware::class)->group(function () {
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
Route::prefix("/role/peserta")->middleware(PesertaMiddleware::class)->group(function () {
    Route::get("/dashboard", [PesertaController::class, "dashboard"])->name("peserta-dashboard");
    Route::post("/logout", [PesertaController::class, "logout"])->name("peserta-logout");
});

// test
Route::get("/test", function () {
    return view("admin.pdf");
})->name("test");