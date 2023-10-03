<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
//use App\http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PembelianController;
use App\Models\Barang;

Route::get('/home', [HomeController::class, 'index']);
Route::get('/profile', [HomeController::class, 'profile']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/faq', [HomeController::class, 'faq']);
Route::get('/dashboard', [HomeController::class, 'dashboard']);
//Route::resource('produk', ProdukController::class);
//Route::resource('pelanggan', PelangganController::class);
//Route::resource('pemasok', PemasokController::class);
//Route::resource('barang', BarangController::class);
//Route::resource('pembelian', PembelianController::class);

//login
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//route untuk yang sudah login
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('profile', [HomeController::class, 'profile']);
    Route::get('contact', [HomeController::class, 'contact']);
    Route::resource('produk', ProdukController::class);
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('pemasok', PemasokController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('pembelian', PembelianController::class);
});

//latihan 2
//Route::get('/',[DashboardController::class, 'index' ]);
//Route::get('/',[DashboardController::class, 'blog' ]);