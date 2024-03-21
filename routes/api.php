<?php

use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\CustomerController;
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
Route::post('signin', 'App\Http\Controllers\Auth\LoginController@signIn');
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@registerApi');

Route::apiResource('supplier', SupplierController::class);
Route::get('buy', 'App\Http\Controllers\Api\ProductController@buy');
Route::get('sell', 'App\Http\Controllers\Api\ProductController@sell');
Route::get('custom_bank', 'App\Http\Controllers\Api\ProductController@custom_bank');
Route::post('update_history', 'App\Http\Controllers\Api\ProductController@update_history');

