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
        Route::get('/{id}', 'SurvivorsController@show')->name('show')->where(['id' => '[0-9]+']);
        Route::post('/', 'SurvivorsController@store')->name('store');
        Route::put('/{survivor1}/reportInfected/{survivor2}', 'SurvivorsController@reportInfectedSurvival')->name('reportInfected');
        Route::put('/{id}', 'SurvivorsController@update')->name('update');
    });

    Route::prefix('reports')->name('reports')->group(function (){
        Route::get('/percentInfected/', 'ReportsController@percentInfected')->name('percentInfected');
        Route::get('/percentNonInfected/', 'ReportsController@percentNonInfected')->name('percentNonInfected');
        Route::get('/averageAmount/', 'ReportsController@averageAmount')->name('averageAmount');
        Route::get('/pointsLost/{id}', 'ReportsController@pointsLost')->name('pointsLost');
    });

    Route::prefix('traders')->name('traders')->group(function (){
        Route::get('/percentInfected/', 'ReportsController@percentInfected')->name('percentInfected');
    });

});
