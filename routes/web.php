<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterUsahaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::view('/fitur', 'pages.fitur');
Route::view('/about', 'pages.about');

/*
|--------------------------------------------------------------------------
| Register Usaha (bisa diakses semua orang)
|--------------------------------------------------------------------------
*/

Route::get('/register-usaha', [RegisterUsahaController::class, 'create'])
    ->name('register_usaha');

Route::post('/register-usaha', [RegisterUsahaController::class, 'store'])
    ->name('register_usaha.store');


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| Profile (harus login)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Produk
|--------------------------------------------------------------------------
*/


Route::middleware(['auth'])->group(function () {
    Route::resource('produk', ProdukController::class);
});

/*
|--------------------------------------------------------------------------
| Kategori
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::resource('kategori', KategoriController::class);
});


/*
|--------------------------------------------------------------------------
| Transaksi
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::resource('transaksi', TransaksiController::class);
});

/*
|--------------------------------------------------------------------------
| Barcode
|--------------------------------------------------------------------------
*/
Route::get('/barcode', [App\Http\Controllers\BarcodeController::class, 'index'])
    ->name('barcode.index');

require __DIR__ . '/auth.php';
