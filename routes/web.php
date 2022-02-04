<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\TesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('daftar')->name('daftar.')->group(function () {
    Route::get('', [DaftarController::class, 'index'])->name('index');
    Route::post('store', [DaftarController::class, 'store'])->name('store');
});

Route::prefix('sekolah')->name('sekolah.')->group(function () {
    Route::get('', [SekolahController::class, 'index'])->name('index');
    Route::post('store', [SekolahController::class, 'store'])->name('store');
    Route::put('update', [SekolahController::class, 'update'])->name('update');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('index');
    Route::post('store', [AdminController::class, 'store'])->name('store');
    Route::put('update', [AdminController::class, 'update'])->name('update');
    Route::get('delete/{id}', [AdminController::class, 'delete'])->name('delete');
});

Route::prefix('panitia')->name('panitia.')->group(function () {
    Route::get('', [PanitiaController::class, 'index'])->name('index');
    Route::post('store', [PanitiaController::class, 'store'])->name('store');
    Route::put('update', [PanitiaController::class, 'update'])->name('update');
    Route::delete('delete/{id}', [PanitiaController::class, 'delete'])->name('delete');
});

Route::prefix('peserta')->name('peserta.')->group(function () {
    Route::get('', [PrincipalController::class, 'index'])->name('index');
});

Route::prefix('tes')->name('tes.')->group(function () {
    Route::get('', [TesController::class, 'index'])->name('index');
    Route::post('store', [TesController::class, 'store'])->name('store');
    Route::put('update', [TesController::class, 'update'])->name('update');
    Route::delete('delete/{id}', [TesController::class, 'delete'])->name('delete');
    Route::put('status/{id}', [TesController::class, 'status'])->name('status');

    Route::prefix('soal')->name('soal.')->group(function () {
        Route::get('/{tes_id}', [TesController::class, 'indexSoal'])->name('index');
        Route::get('create/{tes_id}', [TesController::class, 'createSoal'])->name('create');
        Route::post('store/{tes_id}', [TesController::class, 'storeSoal'])->name('store');
        Route::get('edit/{tes_id}/{soal_id}', [TesController::class, 'editSoal'])->name('edit');
        Route::get('lihat/{tes_id}', [TesController::class, 'lihatSoal'])->name('lihat');
        Route::get('delete/{tes_id}', [TesController::class, 'deleteAll'])->name('deleteAll');
        Route::put('update/{tes_id}/{soal_id}', [TesController::class, 'updateSoal'])->name('update');
        Route::get('delete/{tes_id}/{soal_id}', [TesController::class, 'deleteSoal'])->name('delete');
    });
});

Route::post('/web/upload_image', [TesController::class, 'uploadImage'])->name('web.upload_image');
