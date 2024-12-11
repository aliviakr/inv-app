<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\LaporanMasukController;
use App\Http\Controllers\LaporanKeluarController;
use App\Http\Controllers\LaporanKeuanganController;



// Route::get('/', function () {
//     return view('welcome');
// });

// Route untuk login
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/', [AuthController::class, 'store']);

// Route untuk logout
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Route untuk dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Route untuk barang
Route::get('barang', [BarangController::class, 'index'])->name('barang.index')->middleware('auth');
Route::get('barang/create', [BarangController::class, 'create'])->name('barang.create')->middleware('auth');
Route::post('barang', [BarangController::class, 'store'])->name('barang.store')->middleware('auth');
Route::delete('barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy')->middleware('auth');
Route::get('barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit')->middleware('auth');
Route::put('barang/{id}', [BarangController::class, 'update'])->name('barang.update')->middleware('auth');
Route::get('barang/cetak-pdf', [BarangController::class, 'cetakPdf'])->name('barang.cetak-pdf')->middleware('auth');

// Route untuk barang masuk
Route::get('/barang-masuk', [BarangMasukController::class, 'index'])->name('barang-masuk.index')->middleware('auth');
Route::get('/barang-masuk/create', [BarangMasukController::class, 'create'])->name('barang-masuk.create')->middleware('auth');
Route::post('/barang-masuk', [BarangMasukController::class, 'store'])->name('barang-masuk.store')->middleware('auth');
Route::get('/barang-masuk/{id}/edit', [BarangMasukController::class, 'edit'])->name('barang-masuk.edit')->middleware('auth');
Route::put('/barang-masuk/{id}', [BarangMasukController::class, 'update'])->name('barang-masuk.update')->middleware('auth');
Route::delete('/barang-masuk/{id}', [BarangMasukController::class, 'destroy'])->name('barang-masuk.destroy')->middleware('auth');

// Route untuk barang keluar
Route::get('/barang-keluar', [BarangKeluarController::class, 'index'])->name('barang-keluar.index')->middleware('auth');
Route::get('/barang-keluar/create', [BarangKeluarController::class, 'create'])->name('barang-keluar.create')->middleware('auth');
Route::post('/barang-keluar', [BarangKeluarController::class, 'store'])->name('barang-keluar.store')->middleware('auth');
Route::get('/barang-keluar/{id}/edit', [BarangKeluarController::class, 'edit'])->name('barang-keluar.edit')->middleware('auth');
Route::put('/barang-keluar/{id}', [BarangKeluarController::class, 'update'])->name('barang-keluar.update')->middleware('auth');
Route::delete('/barang-keluar/{id}', [BarangKeluarController::class, 'destroy'])->name('barang-keluar.destroy')->middleware('auth');

// Route untuk kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index')->middleware('auth');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create')->middleware('auth');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store')->middleware('auth');
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit')->middleware('auth');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update')->middleware('auth');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy')->middleware('auth');

// Route untuk laporan barang masuk
Route::get('laporan-masuk', [LaporanMasukController::class, 'index'])->name('laporan-masuk.index')->middleware('auth');
Route::get('laporan-masuk/cetak-pdf', [LaporanMasukController::class, 'cetakPdf'])->name('laporan-masuk.cetak-pdf')->middleware('auth');

// Route untuk riwayat barang keluar
Route::get('laporan-keluar', [LaporanKeluarController::class, 'index'])->name('laporan-keluar.index')->middleware('auth');
Route::get('laporan-keluar/cetak-pdf', [LaporanKeluarController::class, 'cetakPdf'])->name('laporan-keluar.cetak-pdf')->middleware('auth');

// Route untuk laporan keuangan
Route::get('laporan-keuangan', [LaporanKeuanganController::class, 'index'])->name('laporan-keuangan.index')->middleware('auth');
Route::get('laporan-keuangan/cetak-pdf', [LaporanKeuanganController::class, 'cetakPdf'])->name('laporan-keuangan.cetak-pdf')->middleware('auth');
