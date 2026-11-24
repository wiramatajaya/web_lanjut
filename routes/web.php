<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('/', fn () => view('dashboard'))->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Surat Masuk (yang ada create harus DI ATAS show)
        Route::resource('surat-masuk', SuratMasukController::class)
        ->only(['index', 'show','create','edit'])
        ->parameters(['surat-masuk' => 'id']);
    Route::resource('surat-masuk', SuratMasukController::class)
        ->except(['index', 'show','create','edit','delete'])
        ->parameters(['surat-masuk' => 'id'])
        ->middleware('can:manage-letters');
    Route::resource('surat-keluar', SuratKeluarController::class)
        ->only(['index', 'show'])
        ->parameters(['surat-keluar' => 'id']);
    Route::resource('surat-keluar', SuratKeluarController::class)
        ->except(['index', 'show','create'])
        ->parameters(['surat-keluar' => 'id'])
        ->middleware('can:manage-letters');



});

// //ROUTER DASAR
// route :: get('/surat-masuk', function () {
//     return 'halaman surat masuk';
// })->name('surat-masuk.show');

// //ROUTER DASAR DENGAN PARAMETER
// route :: get('/surat-masuk/{id}', function ($id) {
//     return 'surat masuk dengan id:' .$id;
// })->name('surat-masuk.show');


//route controller
//Route::get('/surat-masuk', [suratmasukcontroller::class, 'index'])->name('surat-masuk.index');


//Route::get('/surat-masuk/{id}', [suratmasukcontroller::class, 'show'])->name('surat-masuk.show');

//Route::get('/surat-keluar', [suratkeluarcontroller::class, 'index'])
//    ->name('surat-keluar.index');

//Route::get('/surat-keluar/{id}', [suratkeluarcontroller::class, 'show'])
  //  ->name('surat-keluar.show');