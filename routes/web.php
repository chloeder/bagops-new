<?php

use App\Http\Controllers\AuthController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware(['auth',]);

// Admin
Route::middleware('role_admin')->group(function () {
  Route::get('/admin/kategori/laporan-rutin', [DashboardController::class, 'kategoriRutin'])->name('kategori.rutin');
  Route::get('/admin/kategori/laporan-non-rutin', [DashboardController::class, 'kategoriNonRutin'])->name('kategori.non.rutin');

  Route::get('/admin/berkas-pelaporan', [DashboardController::class, 'berkasPelaporan'])->name('berkas.pelaporan');
  Route::get('/admin/berkas-pelaporan/detail/{id}', [DashboardController::class, 'detailBerkasPelaporan'])->name('detail.berkas.pelaporan');
  Route::put('/admin/berkas-pelaporan/detail/{id}', [DashboardController::class, 'updateStatusBerkas'])->name('update.status.berkas');
  Route::get('/admin/berkas-pelaporan/edit/{id}', [DashboardController::class, 'editBerkasPelaporan'])->name('edit.berkas.pelaporan');
  Route::put('/admin/berkas-pelaporan/edit/{id}', [DashboardController::class, 'updateBerkasPelaporan'])->name('update.berkas.pelaporan');
  Route::delete('/admin/berkas-pelaporan/delete/{id}', [DashboardController::class, 'deleteBerkasPelaporan'])->name('delete.berkas.pelaporan');

  Route::get('/admin/laporan/laporan-kinerja', [DashboardController::class, 'laporanKinerja'])->name('laporan.kinerja');
  Route::get('/admin/laporan/laporan-kinerja/profile-polsek/{id}', [DashboardController::class, 'profilePolsek'])->name('profile.polsek');
  Route::put('/admin/laporan/laporan-kinerja/profile-polsek/{id}', [DashboardController::class, 'updateProfilePolsek'])->name('update.profile.polsek');
  Route::get('/admin/laporan/laporan-berkas', [DashboardController::class, 'laporanBerkas'])->name('laporan.berkas');

  Route::get('/admin/daftar-user', [DashboardController::class, 'daftarUser'])->name('daftar.user');
});

// Operator
Route::middleware('role_user')->group(function () {
  Route::get('/masukkan-laporan', [DashboardController::class, 'masukkanLaporan'])->name('masukkan.laporan');
  Route::post('/masukkan-laporan', [DashboardController::class, 'masukkanLaporanPost'])->name('masukkan.laporan.post');
  Route::get('/daftar-laporan', [DashboardController::class, 'daftarLaporan'])->name('daftar.laporan');
  Route::get('/daftar-laporan/detail/{id}', [DashboardController::class, 'detailLaporan'])->name('detail.laporan');
  Route::get('/kinerja-satuan', [DashboardController::class, 'kinerjaSatuan'])->name('kinerja.satuan');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login_auth'])->name('login.auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
