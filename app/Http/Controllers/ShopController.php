<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\json_decode;

class ShopController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    // 距離の算出ロジック
    // kmの場合は6371、mileの場合は3959
    $shop_distance = '6371 * acos(
              cos(radians(?))
              * cos(radians(shop_address_lat))
              * cos(radians(shop_address_lng) - radians(?))
              + sin(radians(?))
              * sin(radians(shop_address_lat)))';
    $street_distance = '6371 * acos(
              cos(radians(?))
              * cos(radians(street_lat))
              * cos(radians(street_lng) - radians(?))
              + sin(radians(?))
              * sin(radians(street_lat)))';
    // デフォルトの範囲
    $range = $request->input('range') ? (float)$request->input('range') : '1.85';
    $street_id = $request->street_id;

    if (isset($street_id)) {
      // ドリルダウンから探した場合
      $street = DB::table('m_streets')
        ->select('street_id', 'street_name', 'town_id', 'town_name', 'city_id', 'city_name', 'pref_id', 'pref_name', 'street_lat', 'street_lng')
        ->join('m_towns', 'm_streets.street_town_id', '=', 'm_towns.town_id')
        ->join('m_cities', 'm_towns.town_city_id', '=', 'm_cities.city_id')
        ->join('m_prefs', 'm_cities.city_pref_id', '=', 'm_prefs.pref_id')
        ->where('street_id', '=', $street_id)
        ->first();
      $lat = $street->street_lat;
      $lng = $street->street_lng;
    } else {
      // 現在地から探した場合
      $lat = (float)$request->input('lat');
      $lng = (float)$request->input('lng');
      $street_sql = DB::table('m_streets')
        ->select('street_id', 'street_name', 'street_town_id')
        ->whereRaw($street_distance . '= (select min(' . $street_distance. ') from m_streets)')
        ->toSql();
//      dd(compact(['min_street']));
      $street = DB::table(DB::raw('(' . $street_sql . ') as street'))
        ->select('street_id', 'street_name', 'town_id', 'town_name', 'city_id', 'city_name', 'pref_id', 'pref_name')
        ->join('m_towns', 'street.street_town_id', '=', 'm_towns.town_id')
        ->join('m_cities', 'm_towns.town_city_id', '=', 'm_cities.city_id')
        ->join('m_prefs', 'm_cities.city_pref_id', '=', 'm_prefs.pref_id')
        ->setBindings([$lat, $lng, $lat, $lat, $lng, $lat])
        ->first();
//      dd(compact(['street']));
    }


    // 検索
    $shops = DB::table('m_shops')
      ->selectRaw("
                shop_tabelog_id,
                shop_postcode,
                shop_pref,
                shop_area,
                shop_name,
                shop_category_name,
                shop_score,
                shop_thumbnail_url,
                shop_url_tabelog,
                shop_url_uber_eats,
                shop_url_demaekan,
                shop_url_d_delivery,
                shop_url_rakuten_delivery,
                shop_address,
                shop_address_lat,
                shop_address_lng,
                created_at,
                updated_at,
                deleted_at," .
        $shop_distance . "
                 as distance
                ", [$lat, $lng, $lat])
      ->whereRaw('(shop_url_d_delivery is not null  or shop_url_rakuten_delivery is not null or shop_url_uber_eats is not null or shop_url_demaekan is not null) and ' .
        $shop_distance . '< ' . $range, [$lat, $lng, $lat])
      ->orderByRaw('shop_score desc ,' . $shop_distance, [$lat, $lng, $lat])
      ->paginate(10);
//        dd(compact('shops'));

    return view('shop.index', compact(['shops', 'street_id', 'street', 'lat', 'lng']));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
