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
Route::get('/admin/kategori/laporan-rutin', [DashboardController::class, 'kategoriRutin'])->name('kategori.rutin')->middleware(['auth']);
Route::get('/admin/kategori/laporan-non-rutin', [DashboardController::class, 'kategoriNonRutin'])->name('kategori.non.rutin')->middleware('auth');

Route::get('/admin/berkas-pelaporan', [DashboardController::class, 'berkasPelaporan'])->name('berkas.pelaporan')->middleware('auth');
Route::get('/admin/berkas-pelaporan/detail/{id}', [DashboardController::class, 'detailBerkasPelaporan'])->name('detail.berkas.pelaporan')->middleware('auth');
Route::put('/admin/berkas-pelaporan/detail/{id}', [DashboardController::class, 'updateStatusBerkas'])->name('update.status.berkas')->middleware('auth');
Route::get('/admin/berkas-pelaporan/edit/{id}', [DashboardController::class, 'editBerkasPelaporan'])->name('edit.berkas.pelaporan')->middleware('auth');
Route::put('/admin/berkas-pelaporan/edit/{id}', [DashboardController::class, 'updateBerkasPelaporan'])->name('update.berkas.pelaporan')->middleware('auth');
Route::delete('/admin/berkas-pelaporan/delete/{id}', [DashboardController::class, 'deleteBerkasPelaporan'])->name('delete.berkas.pelaporan')->middleware('auth');

Route::get('/admin/laporan/laporan-kinerja', [DashboardController::class, 'laporanKinerja'])->name('laporan.kinerja')->middleware('auth');
Route::get('/admin/laporan/laporan-berkas', [DashboardController::class, 'laporanBerkas'])->name('laporan.berkas')->middleware('auth');

// Operator
Route::get('/masukkan-laporan', [DashboardController::class, 'masukkanLaporan'])->name('masukkan.laporan')->middleware('auth');
Route::post('/masukkan-laporan', [DashboardController::class, 'masukkanLaporanPost'])->name('masukkan.laporan.post')->middleware('auth');
Route::get('/daftar-laporan', [DashboardController::class, 'daftarLaporan'])->name('daftar.laporan')->middleware('auth');
Route::get('/kinerja-satuan', [DashboardController::class, 'kinerjaSatuan'])->name('kinerja.satuan')->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login_auth'])->name('login.auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
