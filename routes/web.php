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
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/saveProduct', [App\Http\Controllers\productController::class, 'saveProduct'])->name('saveProduct');
Route::get('/allProducts', [App\Http\Controllers\productController::class, 'allProducts'])->name('allProducts');
Route::post('/dropProduct', [App\Http\Controllers\productController::class, 'dropProduct'])->name('dropProduct');
Route::post('/upDateProducts', [App\Http\Controllers\productController::class, 'upDateProducts'])->name('upDateProducts');


Route::get('/store', [App\Http\Controllers\cardController::class, 'store'])->name('store');
Route::post('/cardAdd', [App\Http\Controllers\cardController::class, 'cardAdd'])->name('cardAdd');
Route::get('/cartList', [App\Http\Controllers\cardController::class, 'cartList'])->name('cartList');
Route::get('/totalP', [App\Http\Controllers\cardController::class, 'totalP'])->name('totalP');
Route::post('/remove', [App\Http\Controllers\cardController::class, 'remove'])->name('remove');
Route::post('/delet', [App\Http\Controllers\cardController::class, 'delet'])->name('delet');

Route::post('/sale', [App\Http\Controllers\saleController::class, 'sale'])->name('sale');
Route::get('/report', [App\Http\Controllers\saleController::class, 'report'])->name('report');
