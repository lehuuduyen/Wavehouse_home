<?php

use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\KhoController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SupplierController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('supplier', SupplierController::class);
Route::apiResource('product', ProductController::class);
Route::apiResource('coupon', CouponController::class);
Route::apiResource('kho', KhoController::class);
Route::post('product/import', 'App\Http\Controllers\Api\ProductController@import')->name('import');
Route::get('wavehouse/except','App\Http\Controllers\Api\KhoController@except');
