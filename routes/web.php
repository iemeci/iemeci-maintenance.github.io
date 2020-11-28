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
    Route::get('/', function () {return view('index');})->name('home');
    Route::get('/pref/{pref_id}', 'm_CityController@index')->name('m_pref.index');
    Route::get('/city/{city_id}', 'm_TownController@index')->name('m_city.index');
    Route::get('/town/{town_id}', 'm_StreetController@index')->name('m_town.index');
    Route::get('/street/{street_id}', 'm_ShopController@index')->name('m_street.index');
    Route::get('/search', 'm_shopController@index')->name('shop.index');

    Route::get('/info/privacy_policy', function () {
        return view('info.privacy_policy');
    })->name('info.privacy_policy');
});
