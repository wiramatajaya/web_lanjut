<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;


Route::resource('/surat',SuratMasukController::class)->only(['index','show']);

// Route::get('/', [SuratMasukController::class, 'show'])->name('surat-masuk.show');