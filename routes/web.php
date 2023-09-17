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

Route::get('/products', function () {
    return view('products');
});
Route::get('/coupon', function () {
    return view('coupon.list');
});
Route::get('/kho', function () {
    return view('kho.list');
});
Route::get('/coupon/import', function () {
    return view('coupon.import');
});
Route::get('/coupon/sell', function () {
    return view('coupon.sell');
});
Route::get('/print', function () {
    return view('layouts.print');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
