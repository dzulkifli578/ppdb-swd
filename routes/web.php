<?php

use App\Http\Controllers\RootController;
use Illuminate\Support\Facades\Route;

// root
Route::prefix("/")->group(function () {
    ROute::get("", [RootController::class, "index"])->name("index");
});
