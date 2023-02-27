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

/**
 * URL API untuk Masyarakat Umum
 * http://[ip-address]/[nama-project]/public/api/v1/method
 *
 */

Route::group(['prefix' => 'v1'], function () {

    Route::get('halte', 'API\HalteController@getAllHalte');
    Route::get('promo', 'API\PromoController@getAllPromo');
});
