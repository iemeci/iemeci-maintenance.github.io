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
    $sitemap->setCache('laravel.sitemap', 1440);
    if (!$sitemap->isCached()) {
      // sitemapのURLを追加
      $sitemap->addSitemap(route('sitemap-area_prefs'));
      $sitemap->addSitemap(route('sitemap-towns', ['area_group_id' => 0]));
      $sitemap->addSitemap(route('sitemap-towns', ['area_group_id' => 1]));
      $sitemap->addSitemap(route('sitemap-towns', ['area_group_id' => 2]));
      $sitemap->addSitemap(route('sitemap-towns', ['area_group_id' => 3]));
      $sitemap->addSitemap(route('sitemap-towns', ['area_group_id' => 4]));
      $sitemap->addSitemap(route('sitemap-towns', ['area_group_id' => 5]));
      $sitemap->addSitemap(route('sitemap-hokkaido'));
      $sitemap->addSitemap(route('sitemap-tohoku'));
      $sitemap->addSitemap(route('sitemap-kanto'));
      $sitemap->addSitemap(route('sitemap-chubu'));
      $sitemap->addSitemap(route('sitemap-kinki'));
      $sitemap->addSitemap(route('sitemap-chugoku'));
      $sitemap->addSitemap(route('sitemap-kyushu'));
      // sitemapを増やす場合はココに追記していく。
    }
    // XML形式で出力
    // var_dump($sitemap);
    return $sitemap->render('sitemapindex');
  }

  // sitemapを出力する
  public function area_prefs()
  {
    $sitemap = \App::make("sitemap");
    // キャッシュの設定。単位は分
    $sitemap->setCache('laravel.sitemap-basics', 1440);
    if (!$sitemap->isCached()) {
      // ページ１のURLを追加
      $prefs = DB::table('m_prefs')
        ->select('pref_id')
        ;
      //dd(compact(['prefs']));

      $cities = DB::table('m_cities')
        ->select('city_id')
        ;
      // dd(compact(['cities']));

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

    }
    // XML形式で出力
    return $sitemap->render('xml');
  }

  public function towns($area_group_id) {
    $select_area_group = [
      ['01', '02']
      ,['03']
      ,['04']
      ,['05']
      ,['06']
      ,['07']
    ];

    $sitemap = \App::make("sitemap");
    $sitemap->setCache('laravel.sitemap-towns-' . $area_group_id, 1440);
    if (!$sitemap->isCached()) {
      $prefs = DB::table('m_prefs')
        ->select('pref_id', 'pref_area_id')
      ;
      //dd(compact(['prefs']));

      $cities = DB::table('m_cities')
        ->select('city_id', 'city_pref_id')
      ;
      // dd(compact(['cities']));

      $towns = DB::table('m_towns')
        ->select('town_id', 'town_city_id')
      ;

      $towns = DB::table('m_areas')
        ->select('town_id')
        ->join(DB::RAW("({$prefs->toSql()}) as pref"), 'm_areas.area_id', '=', 'pref.pref_area_id')
        ->join(DB::Raw("({$cities->toSql()}) as city"), 'pref.pref_id', '=', 'city.city_pref_id')
        ->join(DB::Raw("({$towns->toSql()}) as town"), 'city.city_id', '=', 'town.town_city_id')
        ->whereIn('area_id', $select_area_group[(integer) $area_group_id])
      ;
      // dd(compact(['towns']));

      foreach($towns->get() as $town) {
        $sitemap->add(
          route('m_town.index', ["town_id" => $town->town_id]),
          Carbon::now(),
          1.0,
          'yearly'
        );
      }
    }
    return $sitemap->render('xml');
  }

  public function streets_hokkaido() {
    $sitemap = \App::make("sitemap");
    // キャッシュの設定。単位は分
    $sitemap->setCache('laravel.sitemap-streets-hokkaido', 1440);
    if (!$sitemap->isCached()) {
      // sitemapのURLを追加
      $areas = DB::table('m_areas')
        ->select('area_id')
        ->where('area_id', '=', '01')
      ;

      $streets = DB::table(DB::raw("({$areas->toSql()}) as areas"))
        ->select('street_id')
        ->join('m_prefs', 'areas.area_id', '=', 'm_prefs.pref_area_id')
        ->join('m_cities', 'm_prefs.pref_id', '=', 'm_cities.city_pref_id')
        ->join('m_towns', 'm_cities.city_id', '=', 'm_towns.town_city_id')
        ->join('m_streets', 'm_towns.town_id', '=', 'm_streets.street_town_id')
        ->setBindings(['01'])
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

  public function streets_tohoku() {
    $sitemap = \App::make("sitemap");
    // キャッシュの設定。単位は分
    $sitemap->setCache('laravel.sitemap-streets-tohoku', 1440);
    if (!$sitemap->isCached()) {
      // sitemapのURLを追加
      $areas = DB::table('m_areas')
        ->select('area_id')
        ->where('area_id', '=', '02')
      ;

      $streets = DB::table(DB::raw("({$areas->toSql()}) as areas"))
        ->select('street_id')
        ->join('m_prefs', 'areas.area_id', '=', 'm_prefs.pref_area_id')
        ->join('m_cities', 'm_prefs.pref_id', '=', 'm_cities.city_pref_id')
        ->join('m_towns', 'm_cities.city_id', '=', 'm_towns.town_city_id')
        ->join('m_streets', 'm_towns.town_id', '=', 'm_streets.street_town_id')
        ->setBindings(['02'])
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

  public function streets_kanto() {
    $sitemap = \App::make("sitemap");
    // キャッシュの設定。単位は分
    $sitemap->setCache('laravel.sitemap-streets-kanto', 1440);
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

  public function streets_chubu() {
    $sitemap = \App::make("sitemap");
    // キャッシュの設定。単位は分
    $sitemap->setCache('laravel.sitemap-streets-chubu', 1440);
    if (!$sitemap->isCached()) {
      // sitemapのURLを追加
      $areas = DB::table('m_areas')
        ->select('area_id')
        ->where('area_id', '=', '04')
      ;

      $streets = DB::table(DB::raw("({$areas->toSql()}) as areas"))
        ->select('street_id')
        ->join('m_prefs', 'areas.area_id', '=', 'm_prefs.pref_area_id')
        ->join('m_cities', 'm_prefs.pref_id', '=', 'm_cities.city_pref_id')
        ->join('m_towns', 'm_cities.city_id', '=', 'm_towns.town_city_id')
        ->join('m_streets', 'm_towns.town_id', '=', 'm_streets.street_town_id')
        ->setBindings(['04'])
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

  public function streets_kinki() {
    $sitemap = \App::make("sitemap");
    // キャッシュの設定。単位は分
    $sitemap->setCache('laravel.sitemap-streets-kinki', 1440);
    if (!$sitemap->isCached()) {
      // sitemapのURLを追加
      $areas = DB::table('m_areas')
        ->select('area_id')
        ->where('area_id', '=', '05')
      ;

      $streets = DB::table(DB::raw("({$areas->toSql()}) as areas"))
        ->select('street_id')
        ->join('m_prefs', 'areas.area_id', '=', 'm_prefs.pref_area_id')
        ->join('m_cities', 'm_prefs.pref_id', '=', 'm_cities.city_pref_id')
        ->join('m_towns', 'm_cities.city_id', '=', 'm_towns.town_city_id')
        ->join('m_streets', 'm_towns.town_id', '=', 'm_streets.street_town_id')
        ->setBindings(['05'])
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

  public function streets_chugoku() {
    $sitemap = \App::make("sitemap");
    // キャッシュの設定。単位は分
    $sitemap->setCache('laravel.sitemap-streets-chugoku', 1440);
    if (!$sitemap->isCached()) {
      // sitemapのURLを追加
      $areas = DB::table('m_areas')
        ->select('area_id')
        ->where('area_id', '=', '06')
      ;

      $streets = DB::table(DB::raw("({$areas->toSql()}) as areas"))
        ->select('street_id')
        ->join('m_prefs', 'areas.area_id', '=', 'm_prefs.pref_area_id')
        ->join('m_cities', 'm_prefs.pref_id', '=', 'm_cities.city_pref_id')
        ->join('m_towns', 'm_cities.city_id', '=', 'm_towns.town_city_id')
        ->join('m_streets', 'm_towns.town_id', '=', 'm_streets.street_town_id')
        ->setBindings(['06'])
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

  public function streets_kyushu() {
    $sitemap = \App::make("sitemap");
    // キャッシュの設定。単位は分
    $sitemap->setCache('laravel.sitemap-streets-kyushu', 1440);
    if (!$sitemap->isCached()) {
      // sitemapのURLを追加
      $areas = DB::table('m_areas')
        ->select('area_id')
        ->where('area_id', '=', '07')
      ;

      $streets = DB::table(DB::raw("({$areas->toSql()}) as areas"))
        ->select('street_id')
        ->join('m_prefs', 'areas.area_id', '=', 'm_prefs.pref_area_id')
        ->join('m_cities', 'm_prefs.pref_id', '=', 'm_cities.city_pref_id')
        ->join('m_towns', 'm_cities.city_id', '=', 'm_towns.town_city_id')
        ->join('m_streets', 'm_towns.town_id', '=', 'm_streets.street_town_id')
        ->setBindings(['07'])
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

