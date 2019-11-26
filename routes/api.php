<?php

use Illuminate\Http\Request;

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

Route::namespace('Api')->group(function () {
    Route::prefix('survivors')->name('survivors')->group(function () {
        Route::get('/', 'SurvivorsController@index')->name('index');
        Route::get('/{id}', 'SurvivorsController@show')->name('show');

        Route::post('/', 'SurvivorsController@store')->name('store');

        Route::put('/{id}', 'SurvivorsController@update')->name('update');
    });
});
