<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/combo', function () {
    return view('pages.combo');
});
Route::get('/guest', function () {
    return view('layouts.guest');
});

Route::get('/products', [ProductController::class, 'index']);

Route::post('/upload', [ImageController::class, 'upload'])->name('image.upload');


Route::resource('images', ImageController::class);

