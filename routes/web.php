<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DinasController;
use App\Http\Controllers\NilaiTesController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\PesertaTesController;
use App\Http\Controllers\ProfilController;
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

Route::prefix('pendaftar')->name('pendaftar.')->group(function () {
    Route::get('', [PendaftarController::class, 'index'])->name('index');
    Route::get('detail/{peserta_id}', [PendaftarController::class, 'detail'])->name('detail');
    Route::get('detail-profil/{profil_id}', [PendaftarController::class, 'detailProfil'])->name('detail_profil');
    Route::get('edit-profil/{profil_id}', [PendaftarController::class, 'editProfil'])->name('edit_profil');
    Route::put('update-profil', [PendaftarController::class, 'updateProfil'])->name('update_profil');
    Route::get('detail-dinas/{peserta_id}', [PendaftarController::class, 'detailDinas'])->name('detail_dinas');
    Route::get('pdf-dinas/{peserta_id}', [PendaftarController::class, 'pdfDinas'])->name('pdf_dinas');
    Route::post('store-dinas', [PendaftarController::class, 'storeDinas'])->name('store_dinas');
    Route::put('update-dinas', [PendaftarController::class, 'updateDinas'])->name('update_dinas');

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
        Route::delete('deleteAll/{tes_id}', [TesController::class, 'deleteAll'])->name('deleteAll');
        Route::put('update/{tes_id}/{soal_id}', [TesController::class, 'updateSoal'])->name('update');
        Route::delete('delete/{tes_id}/{soal_id}', [TesController::class, 'deleteSoal'])->name('delete');
    });
});

Route::prefix('nilai-tes')->name('nilai_tes.')->group(function () {
    Route::get('', [NilaiTesController::class, 'index'])->name('index');
    Route::get('{tes_id}', [NilaiTesController::class, 'indexNilai'])->name('detail');
    Route::get('detail-pengerjaan/{tes_id}/{nilai_id}', [NilaiTesController::class, 'detailPengerjaan'])->name('detail_pengerjaan');
    Route::delete('nilai-delete/{nilai_id}', [NilaiTesController::class, 'nilaiDelete'])->name('nilai_delete');
});

Route::post('/web/upload_image', [TesController::class, 'uploadImage'])->name('web.upload_image');

Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('', [ProfilController::class, 'index'])->name('index');
    Route::post('store', [ProfilController::class, 'store'])->name('store');
    Route::put('update', [ProfilController::class, 'update'])->name('update');
});

Route::prefix('dinas')->name('dinas.')->group(function () {
    Route::get('', [DinasController::class, 'index'])->name('index');
    Route::post('store', [DinasController::class, 'store'])->name('store');
    Route::put('update', [DinasController::class, 'update'])->name('update');
});

Route::prefix('peserta-tes')->name('peserta_tes.')->group(function() {
    Route::get('/', [PesertaTesController::class, 'index'])->name('index');
    Route::get('/{tes_id}', [PesertaTesController::class, 'boarding'])->name('boarding');
    Route::post('/{tes_id}', [PesertaTesController::class, 'access'])->name('access');
    Route::get('/{tes_id}/sesi/{token}', [PesertaTesController::class, 'start'])->name('start');
    Route::post('/{tes_id}/sesi/{token}', [PesertaTesController::class, 'finish'])->name('finish');
    Route::delete('/{tes_id}/sesi/{token}', [PesertaTesController::class, 'exit'])->name('exit');
});

