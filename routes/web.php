<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;


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

// Route untuk barang masuk
Route::get('/barang-masuk', [BarangMasukController::class, 'index'])->name('barang-masuk.index')->middleware('auth');