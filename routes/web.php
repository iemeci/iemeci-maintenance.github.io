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

Route::group(['middleware' => 'auth.very_basic'], function()
{
    Route::get('/', function () {
        return view('index');
    });

    Route::get('/search', 'ShopController@index')->name('shop.index');

    Route::get('/info/privacy_policy', function () {
        return view('info.privacy_policy');
    })->name('info.privacy_policy');
});
