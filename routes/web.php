<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterUsahaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\KaryawanController;


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



Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| Laporan
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/laporan', [LaporanController::class, 'index'])
        ->name('laporan');
});
Route::get('/laporan/export', [LaporanController::class, 'export'])
    ->name('laporan.export');

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

    Route::get('/transaksi/pesanan', [TransaksiController::class, 'pesanan'])
        ->name('transaksi.pesanan');

    Route::post('/transaksi/{id}/bayar', [TransaksiController::class, 'bayar'])
        ->name('transaksi.bayar');

    // 🔥 RIWAYAT TARUH DI ATAS RESOURCE
    Route::get('/transaksi/riwayat', [TransaksiController::class, 'riwayat'])
        ->name('transaksi.riwayat');

    Route::resource('transaksi', TransaksiController::class);
});

/*
|--------------------------------------------------------------------------
| Barcode
|--------------------------------------------------------------------------
*/
Route::get('/barcode', [App\Http\Controllers\BarcodeController::class, 'index'])
    ->name('barcode.index');




/*
|--------------------------------------------------------------------------
| Absensi
|--------------------------------------------------------------------------
*/


Route::middleware('auth')->group(function () {

    Route::get('/absensi', [AbsensiController::class, 'index'])
        ->name('absensi.index');

    Route::post('/absensi', [AbsensiController::class, 'store'])
        ->name('absensi.store');

    Route::post('/absensi/bulk', [AbsensiController::class, 'storeBulk'])
        ->name('absensi.storeBulk');

    Route::get('/absensi/riwayat', [AbsensiController::class, 'riwayat'])
        ->name('absensi.riwayat');

    Route::delete('/absensi/{absensi}', [AbsensiController::class, 'destroy'])
        ->name('absensi.destroy');
});

/*
|--------------------------------------------------------------------------
| Karyawan
|--------------------------------------------------------------------------
*/



Route::middleware(['auth'])->group(function () {

    Route::get('/karyawan', [KaryawanController::class, 'index'])
        ->name('karyawan.index');

    Route::get('/karyawan/create', [KaryawanController::class, 'create'])
        ->name('karyawan.create');

    Route::post('/karyawan', [KaryawanController::class, 'store'])
        ->name('karyawan.store');

    Route::get('/karyawan/{user}/edit', [KaryawanController::class, 'edit'])
        ->name('karyawan.edit');

    Route::put('/karyawan/{user}', [KaryawanController::class, 'update'])
        ->name('karyawan.update');

    Route::delete('/karyawan/{user}', [KaryawanController::class, 'destroy'])
        ->name('karyawan.destroy');
});
require __DIR__ . '/auth.php';
