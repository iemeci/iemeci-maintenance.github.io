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
    Route::get('/search', 'm_ShopController@index')->name('shop.index');

    Route::get('/info/privacy_policy', function () {
        return view('info.privacy_policy');
    })->name('info.privacy_policy');

  // sitemap-indexのルート
  Route::get('sitemap.xml', 'SitemapController@index')->name('sitemap');
  Route::group(['prefix' => 'sitemaps'], function() {
    // sitemapのルート
    Route::get('area_prefs.xml', 'SitemapController@area_prefs')->name('sitemap-area_prefs');
    Route::get('towns_{area_group_id}.xml', 'SitemapController@towns')->name('sitemap-towns');
    Route::get('streets_hokkaido.xml', 'SitemapController@streets_hokkaido')->name('sitemap-hokkaido');
    Route::get('streets_tohoku.xml', 'SitemapController@streets_tohoku')->name('sitemap-tohoku');
    Route::get('streets_kanto.xml', 'SitemapController@streets_kanto')->name('sitemap-kanto');
    Route::get('streets_chubu.xml', 'SitemapController@streets_chubu')->name('sitemap-chubu');
    Route::get('streets_kinki.xml', 'SitemapController@streets_kinki')->name('sitemap-kinki');
    Route::get('streets_chugoku.xml', 'SitemapController@streets_chugoku')->name('sitemap-chugoku');
    Route::get('streets_kyushu.xml', 'SitemapController@streets_kyushu')->name('sitemap-kyushu');
    // sitemapを増やす場合はココに追記していく。
  });
});
