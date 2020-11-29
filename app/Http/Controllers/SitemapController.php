<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class SitemapController extends Controller
{
  // sitemap-indexを出力する
  public function index()
  {
    $sitemap = \App::make("sitemap");
    // キャッシュの設定。単位は分
    $sitemap->setCache('laravel.sitemap', 1);
    if (!$sitemap->isCached()) {
      // sitemapのURLを追加
      $sitemap->addSitemap(route('sitemap-area_towns'));
      $sitemap->addSitemap(route('sitemap-kanto'));
      // sitemapを増やす場合はココに追記していく。
    }
    // XML形式で出力
    // var_dump($sitemap);
    return $sitemap->render('sitemapindex');
  }

  // sitemapを出力する
  public function area_towns()
  {
    $sitemap = \App::make("sitemap");
    // キャッシュの設定。単位は分
    $sitemap->setCache('laravel.sitemap-basics', 1);
    if (!$sitemap->isCached()) {
      $select_pref = ['08', '09', '10', '11', '12', '13', '14'];
      // ページ１のURLを追加
      $prefs = DB::table('m_prefs')
        ->select('pref_id')
        ->whereIn('pref_id', $select_pref)
        ;
      //dd(compact(['prefs']));

      $cities = DB::table('m_cities')
        ->select('city_id')
        ->whereIn('city_pref_id', $select_pref)
        ;
      // dd(compact(['cities']));

      $towns = DB::table('m_towns')
        ->select('town_id')
        ->join(DB::Raw("({$cities->toSql()}) as city"), 'm_towns.town_city_id', '=', 'city.city_id')
        ->setBindings($select_pref)
        ;
      // dd(compact(['towns']));

      $sitemap->add(
        route('home'),
        Carbon::now(),
        1.0,
        'weekly'
      );
      $sitemap->add(
        route('info.privacy_policy'),
        Carbon::now(),
        1.0,
        'monthly'
      );


      foreach($prefs->get() as $pref) {
        $sitemap->add(
          route('m_pref.index', ["pref_id" => $pref->pref_id]),
          Carbon::now(),
          1.0,
          'yearly'
        );
      }

      foreach($cities->get() as $city) {
        $sitemap->add(
          route('m_city.index', ["city_id" => $city->city_id]),
          Carbon::now(),
          1.0,
          'yearly'
        );
      }

      foreach($towns->get() as $town) {
        $sitemap->add(
          route('m_town.index', ["town_id" => $town->town_id]),
          Carbon::now(),
          1.0,
          'yearly'
        );
      }
    }
    // XML形式で出力
    return $sitemap->render('xml');
  }

  public function streets_kanto() {
    $sitemap = \App::make("sitemap");
    // キャッシュの設定。単位は分
    $sitemap->setCache('laravel.sitemap-index', 1);
    if (!$sitemap->isCached()) {
      // sitemapのURLを追加
      $areas = DB::table('m_areas')
        ->select('area_id')
        ->where('area_id', '=', '03')
      ;

      $streets = DB::table(DB::raw("({$areas->toSql()}) as areas"))
        ->select('street_id')
        ->join('m_prefs', 'areas.area_id', '=', 'm_prefs.pref_area_id')
        ->join('m_cities', 'm_prefs.pref_id', '=', 'm_cities.city_pref_id')
        ->join('m_towns', 'm_cities.city_id', '=', 'm_towns.town_city_id')
        ->join('m_streets', 'm_towns.town_id', '=', 'm_streets.street_town_id')
        ->setBindings(['03'])
        ->get();


      foreach($streets as $street) {
        $sitemap->add(
          route('m_street.index', ["street_id" => $street->street_id]),
          Carbon::now(),
          1.0,
          'monthly'
        );
      }
    }
    // XML形式で出力
    return $sitemap->render('xml');
  }
}
