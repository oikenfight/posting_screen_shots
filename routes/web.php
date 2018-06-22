<?php

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

Route::group(['middleware' => ['web']], function () {
    Route::get('/', [
        'uses' => 'ScreenShotController@index',
        'as' => 'index',
    ]);

    Route::get('/list/{date}', [
        'uses' => 'ScreenShotController@list',
        'as' => 'list',
    ]);

    Route::get('/show/{image}', [
        'uses' => 'ScreenShotController@show',
        'as' => 'show',
    ]);
});

