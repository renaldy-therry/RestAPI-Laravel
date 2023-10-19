<?php

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\AuthenticationController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['auth:sanctum'])->group(function () {

    Route::controller(BarangController::class)->group(function () {
        Route::get('/barang', 'index');
        Route::get('/barang/{id}', 'show');
        Route::post('/barang', 'store');
        Route::put('/barang/{id}','update');
        Route::delete('/barang/{id}', 'destroy');
    });

    Route::controller(PembeliController::class)->group(function () {
        Route::get('/pembeli', 'index');
        Route::get('/pembeli/{id}', 'show');
        Route::post('/pembeli', 'store');
        Route::put('/pembeli/{id}','update');
        Route::delete('/pembeli/{id}', 'destroy');
    });

    Route::controller(SuplierController::class)->group(function () {
        Route::get('/suplier', 'index');
        Route::get('/suplier/{id}', 'show');
        Route::post('/suplier', 'store');
        Route::put('/suplier/{id}','update');
        Route::delete('/suplier/{id}', 'destroy');
    });

    Route::controller(PesananController::class)->group(function () {
        Route::get('/pesanan', 'index');
        Route::get('/pesanan/{id}', 'show');
        Route::post('/pesanan', 'store');
        Route::put('/pesanan/{id}','update');
        Route::delete('/pesanan/{id}', 'destroy');
    });

    Route::controller(PembelianController::class)->group(function () {
        Route::get('/pembelian', 'index');
        Route::get('/pembelian/{id}', 'show');
        Route::post('/pembelian', 'store');
        Route::put('/pembelian/{id}','update');
        Route::delete('/pembelian/{id}', 'destroy');
    });

    Route::get('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/me', [AuthenticationController::class, 'me']);

});

Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/register', [AuthenticationController::class, 'register']);

