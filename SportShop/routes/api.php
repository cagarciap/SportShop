<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/v3/products', 'Api\ProductApiV3@index')->name("api.v3.product.index");
Route::get('/v3/products/paginate', 'Api\ProductApiV3@paginate')->name("api.v3.product.paginate");
Route::get('/v2/products', 'Api\ProductApiV2@index')->name("api.v2.product.index");
