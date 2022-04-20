<?php

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

Route::get('/', function () {
    return view('auth.login');
});


Route::prefix('petugas')->namespace('Petugas')->middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::post('/create', [App\Http\Controllers\PetugasMasukController::class,'store'])->name('create-data');

    Route::post('/ruang',[App\Http\Controllers\PetugasRuangController::class,'update'])->name('pilih-ruang');

    Route::post('/update/{id}', [App\Http\Controllers\PetugasKeluarController::class,'update'])->name('update-data');
    Route::get('/search', [App\Http\Controllers\PetugasKeluarController::class,'cari'])->name('petugas-cari');
});

Route::prefix('admin')->namespace('Admin')->middleware(['auth', 'check'])->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class,'index'])->name('admin');

    //daftar kendaraan
    Route::get('/kendaraan',[App\Http\Controllers\AdminController::class,'kendaraan'] )->name('kendaraan');
    Route::get('/cari-kendaraan',[App\Http\Controllers\AdminController::class,'cari'] )->name('cari-kendaraan');

    //parkir
    Route::get('/ruang-parkir',[App\Http\Controllers\AdminController::class,'parkir'] )->name('ruang-parkir');
    Route::post('/update-ruang/{id}',[App\Http\Controllers\AdminController::class,'update'] )->name('update-ruang');
    Route::get('/cari-ruang',[App\Http\Controllers\AdminController::class,'cari_ruang'] )->name('cari-ruang');
    Route::get('/tambah-ruang',[App\Http\Controllers\AdminController::class,'tambah_ruang'] )->name('tambah-ruang');
    Route::get('/remove/{id}',[App\Http\Controllers\AdminController::class,'remove'] )->name('hapus-ruang');

    //laporan
    Route::get('/laporan',[App\Http\Controllers\AdminController::class,'laporan'] )->name('laporan');
    Route::get('/laporan/detail/{date}',[App\Http\Controllers\AdminController::class,'detailLaporan'] )->name('detail-laporan');

    //daftar petugas
    Route::get('/users',[App\Http\Controllers\AdminController::class,'users'] )->name('users');

});


    Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Auth::routes();

