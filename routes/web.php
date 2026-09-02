<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KwuController;
use App\Http\Controllers\PsdmController;
use App\Http\Controllers\SyiarController;
use App\Http\Controllers\KominfoController;
use App\Http\Controllers\admin\blogController;
use App\Http\Controllers\admin\rapatController;
use App\Http\Controllers\KemuslimahanController;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BphController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\DetailPengurusController;

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

Route::get('/',  [LandingPageController::class, 'index']);
Route::get('/rapat',  [LandingPageController::class, 'rapat']);
Route::get('/detail-anggota',  [LandingPageController::class, 'detail_anggota']);

// Route::get('/cek', [LandingPageController::class, 'index']);
Route::prefix('admin')->group(function () {
    // Route::get('/', [dashboardController::class, 'index']);
    // blog
    Route::get('/', [blogController::class, 'index']);
    Route::post('/saveBlog', [blogController::class, 'store']);
    Route::put('/blog/{id}', [blogController::class, 'update']);
    Route::delete('/blog/{id}', [blogController::class, 'destroy']);

    // rapat
    Route::get('/rapat', [rapatController::class, 'index']);
    Route::post('/saveRapat', [rapatController::class, 'store']);
    Route::put('/rapat/{id}', [rapatController::class, 'update']);
    Route::delete('/rapat/{id}', [rapatController::class, 'destroy']);

    // departement
    // kominfo
    Route::get('/bph', [BphController::class, 'index']);
    Route::post('/saveBph', [BphController::class, 'store']);
    Route::put('/bph/{id}', [BphController::class, 'update']);
    Route::delete('/bph/{id}', [BphController::class, 'destroy']);

    Route::get('/kominfo', [KominfoController::class, 'index']);
    ROute::post('/saveKominfo', [KominfoController::class, 'store']);
    Route::put('/kominfo/{id}', [KominfoController::class, 'update']);
    Route::delete('/kominfo/{id}', [KominfoController::class, 'destroy']);

    // departement
    // syiar
    Route::get('/syiar', [SyiarController::class, 'index']);
    Route::post('/saveSyiar', [SyiarController::class, 'store']);
    Route::put('/syiar/{id}', [SyiarController::class, 'update']);
    Route::delete('/syiar/{id}', [SyiarController::class, 'destroy']);

    // departement
    // kemuslimahan
    Route::get('/kemuslimahan', [KemuslimahanController::class, 'index']);
    Route::post('/saveKemuslimahan', [KemuslimahanController::class, 'store']);
    Route::put('/kemuslimahan/{id}', [KemuslimahanController::class, 'update']);
    Route::delete('/kemuslimahan/{id}', [KemuslimahanController::class, 'destroy']);

    // departement
    // psdm
    Route::get('/psdm', [PsdmController::class, 'index']);
    Route::post('/savePsdm', [PsdmController::class, 'store']);
    Route::put('/psdm/{id}', [PsdmController::class, 'update']);
    Route::delete('/psdm/{id}', [PsdmController::class, 'destroy']);

    // departement
    // kwu
    Route::get('/kwu', [KwuController::class, 'index']);
    Route::post('/saveKwu', [KwuController::class, 'store']);
    Route::put('/kwu/{id}', [KwuController::class, 'update']);
    Route::delete('/kwu/{id}', [KwuController::class, 'destroy']);
});

    //blog
    Route::get('/', [ArtikelController::class, 'index']);
   
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/detail-anggota', [DetailPengurusController::class, 'detailPengurus']);