<?php

use App\Http\Controllers\DashboardController;
use App\Http\Resources\BerkasResource;
use App\Http\Resources\KategoriDetailResource;
use App\Http\Resources\KategoriResource;
use App\Models\Berkas;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::get('/v1/kategori', [DashboardController::class, 'get_kategori']);
Route::get('/v1/kategori/{id}', [DashboardController::class, 'detail_kategori']);

// Route::get('/v1/kategori', function () {
//   return KategoriResource::collection(Kategori::all());
// });

// Route::get('/v1/kategori/{id}', function ($id) {
//   return new KategoriDetailResource(Kategori::with('berkas')->findOrFail($id));
// });

// Route::get('/v1/berkas', function () {
//   return BerkasResource::collection(Berkas::all());
// });
