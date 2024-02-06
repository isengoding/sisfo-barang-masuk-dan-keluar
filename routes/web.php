<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;

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



Route::get('/combo', function () {
    return view('layouts.app');
});
Route::get('/guest', function () {
    return view('layouts.guest');
});

// Route::get('/products', [ProductController::class, 'index']);
// Route::get('/products', [ProductController::class, 'index']);

Route::post('upload', [ImageController::class, 'upload'])->name('images.upload');
Route::delete('revert', [ImageController::class, 'revert'])->name('images.revert');



Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('images', ImageController::class);

    Route::get('/products/import/create', [ProductController::class, 'importCreate'])->name('products.import.create');
    Route::post('/products/import', [ProductController::class, 'importStore'])->name('products.import.store');
    Route::get('/products/excel', [ProductController::class, 'excel'])->name('products.excel');
    Route::get('/products/pdf', [ProductController::class, 'pdf'])->name('products.pdf');
    Route::resource('products', ProductController::class);

    Route::resource('satuans', SatuanController::class)->except(['show']);
    Route::resource('kategori', KategoriController::class)->except(['show']);
    Route::resource('pelanggan', PelangganController::class)->except(['show']);
    Route::resource('pemasok', PemasokController::class)->except(['show']);
    Route::resource('barang', BarangController::class);
});

