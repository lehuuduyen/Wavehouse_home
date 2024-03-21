<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/buy/{name}', [HomeController::class, 'buy']);
Route::get('/sell/{name}', [HomeController::class, 'sell']);
Route::get('/{name}', [HomeController::class, 'transacsion']);
Route::post('/buy', [HomeController::class, 'create_buy']);
Route::post('/sell', [HomeController::class, 'create_sell']);
Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('products');
    })->middleware('role:2');

    Route::get('/home', function () {
        return view('products');
    })->middleware('role:2');

    Route::get('/history', function () {
        return view('products');
    })->middleware('role:2');
    Route::get('/history/sell', function () {
        return view('sell');
    })->middleware('role:2');
    Route::get('/coupon', function () {
        return view('coupon.list');
    });
    Route::get('/customer', function () {
        return view('customer.list');
    });
    Route::get('/customer/detail', function () {
        return view('customer.detail');
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
    Route::get('/print_hoadon', function () {
        return view('layouts.print_hoadon');
    });
    Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->middleware('role:2');

});

Auth::routes();
