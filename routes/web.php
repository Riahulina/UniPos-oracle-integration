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
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SuperAdminAuthController;


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

Route::get('/pending-approval', function () {
    return view('auth.pending');
})->name('pending.approval');


/*
|--------------------------------------------------------------------------
| Super Admin
|--------------------------------------------------------------------------
*/


Route::middleware(['auth', 'superadmin'])
    ->prefix('superadmin')
    ->name('superadmin.')
    ->group(function () {

        Route::get('/dashboard', [SuperAdminController::class, 'dashboard'])
            ->name('dashboard');

        Route::get('/usaha', [SuperAdminController::class, 'usaha'])
            ->name('usaha');

        Route::put('/usaha/{id}/approve', [SuperAdminController::class, 'approve'])
            ->name('usaha.approve');

        Route::put('/usaha/{id}/reject', [SuperAdminController::class, 'reject'])
            ->name('usaha.reject');

        Route::get('/user', [SuperAdminController::class, 'user'])
            ->name('user');

        Route::put('/user/{id}/toggle', [SuperAdminController::class, 'toggleUser'])
            ->name('user.toggle');

        Route::get('/produk', [SuperAdminController::class, 'produk'])
            ->name('produk');

        Route::get('/transaksi', [SuperAdminController::class, 'transaksi'])
            ->name('transaksi');

        Route::get('/stoklog', [SuperAdminController::class, 'stoklog'])
            ->name('stoklog');

        Route::get('/absensi', [SuperAdminController::class, 'absensi'])
            ->name('absensi');

        Route::get('/setting', [SuperAdminController::class, 'setting'])
            ->name('setting');
    });

// ─────────────────────────────────────────────────────────
// Route login khusus per usaha (akses dari link WA)
// Taruh di luar middleware superadmin
// ─────────────────────────────────────────────────────────
Route::get('/login/{kode}', function ($kode) {

    $usaha = \App\Models\Usaha::where('kode_usaha', $kode)
        ->where('status', 'aktif')
        ->firstOrFail();

    return view('auth.login', [
        'usaha' => $usaha
    ]);
})->name('usaha.login');


/*
|--------------------------------------------------------------------------
| Super Admin login
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/superadmin/login', [SuperAdminAuthController::class, 'create'])
        ->name('superadmin.login');

    Route::post('/superadmin/login', [SuperAdminAuthController::class, 'store'])
        ->name('superadmin.login.store');
});


require __DIR__ . '/auth.php';
