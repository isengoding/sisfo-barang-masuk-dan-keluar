<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FilepondController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangExportController;
use App\Http\Controllers\BarangImportController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangStokLaporanController;
use App\Http\Controllers\BarangMasukLaporanController;
use App\Http\Controllers\BarangKeluarLaporanController;

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
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', [DashboardController::class, 'index']);

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

    Route::get('/barang/stok/laporan/pdf', [BarangStokLaporanController::class, 'pdf'])->name('barang.stok.pdf');
    Route::get('/barang/stok/laporan/excel', [BarangStokLaporanController::class, 'excel'])->name('barang.stok.excel');
    Route::get('/barang/stok/laporan', [BarangStokLaporanController::class, 'index'])->name('barang.stok');

    Route::get('/barang/pdf', [BarangExportController::class, 'pdf'])->name('barang.pdf');
    Route::get('/barang/excel', [BarangExportController::class, 'excel'])->name('barang.excel');
    Route::get('/barang/import', [BarangImportController::class, 'create'])->name('barang.import.create');
    Route::post('/barang/import', [BarangImportController::class, 'store'])->name('barang.import.store');
    Route::resource('barang', BarangController::class);

    Route::post('filepond', [FilepondController::class, 'store'])->name('filepond.store');
    Route::delete('filepond', [FilepondController::class, 'destroy'])->name('filepond.destroy');

    // Routes for Barang Keluar Laporan
    Route::get('barang-keluar/laporan/excel', [BarangKeluarLaporanController::class, 'excel'])
        ->name('barang-keluar.laporan.excel');

    Route::get('barang-keluar/laporan/pdf', [BarangKeluarLaporanController::class, 'pdf'])
        ->name('barang-keluar.laporan.pdf');

    Route::get('barang-keluar/laporan', [BarangKeluarLaporanController::class, 'index'])->name('barang-keluar.laporan');

    // Resource routes for Barang Keluar
    Route::resource('barang-keluar', BarangKeluarController::class);

    Route::get('barang-masuk/laporan/pdf', [BarangMasukLaporanController::class, 'pdf'])
        ->name('barang-masuk.laporan.pdf');

    Route::get('barang-masuk/laporan/excel', [BarangMasukLaporanController::class, 'excel'])
        ->name('barang-masuk.laporan.excel');

    Route::get('barang-masuk/laporan', [BarangMasukLaporanController::class, 'index'])->name('barang-masuk.laporan');
    Route::resource('barang-masuk', BarangMasukController::class);
});

