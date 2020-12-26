<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class m_CityController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($pref_id)
  {

    $pref = DB::table('m_prefs')
      ->select('pref_id', 'pref_name')
      ->where('pref_id', '=', $pref_id)
      ->first();
//        $pref_cities_kanas = DB::table('m_cities')
//            ->selectRaw('distinct ' . DB::raw('left(city_kana, 1)') . ' as first_kana')
//            ->where('city_pref_id', '=', $pref_id)
//        ;
//        dd(compact(['pref']));

    $selected_area = DB::table('m_prefs')
      ->selectRaw('distinct area_id')
      ->join('m_areas', 'm_prefs.pref_area_id', '=', 'm_areas.area_id')
      ->where('pref_id', '=', $pref_id)
      ->first();

//    var_dump($selected_area);

    $other_areas = DB::table('m_prefs')
      ->select('pref_id', 'pref_name', 'area_id')
      ->join('m_areas', 'm_prefs.pref_area_id', '=', 'm_areas.area_id')
      ->where('pref_id', '<>', $pref_id)
      ->where('area_id', '=', $selected_area->area_id)
      ->orderBy('pref_id')
      ->get();
//    dd(compact(['other_areas']));

    $kanas = DB::table('m_kanas')
      ->select('m_kana_groups.kana_group_name')
      ->join('m_kana_groups', 'm_kanas.kana_group_id', '=', 'm_kana_groups.kana_group_id')
//            ->leftJoin( DB::raw('('. $pref_cities_kanas->toSql(). ') as pref_kanas'), 'm_kanas.kana_name', '=', 'pref_kanas.first_kana')
      ->leftJoin(DB::raw('(select distinct left(city_kana, 1) as first_kana from m_cities where city_pref_id = \'' . $pref_id . '\') as pref_kanas'), 'm_kanas.kana_name', '=', 'pref_kanas.first_kana')
      ->whereNotNull('pref_kanas.first_kana')
      ->groupby('m_kana_groups.kana_group_name')
      ->orderBy('m_kana_groups.kana_group_id')
      ->get();

//        dd(compact(['kanas']));

    $arr_disp = array();
    foreach ($kanas as $kana) {
      $cities = DB::table('m_cities')
        ->selectRaw('distinct city_id, city_name, city_kana')
        ->leftJoin('m_kanas', DB::raw('left(city_kana, 1)'), '=', 'm_kanas.kana_name')
        ->leftJoin('m_kana_groups', 'm_kanas.kana_group_id', '=', 'm_kana_groups.kana_group_id')
        ->where('city_pref_id', '=', $pref_id)
        ->where('m_kana_groups.kana_group_name', '=', $kana->kana_group_name)
        ->orderBy('city_kana')
        ->get();
      $arr_disp[] = array($kana->kana_group_name => $cities);
    }

//        //
//        $kanas = DB::table('m_kanas')
//            ->select('m_kanas.kana_name', 'm_kana_groups.kana_group_name')
//            ->join('m_kana_groups', 'm_kanas.kana_group_id', '=', 'm_kana_groups.kana_group_id')
//            ->join('m_cities', 'm_kanas.kana_name', '=', DB::raw('left(m_cities.city_kana, 1)'))
//            ->join('m_prefs', 'm_cities.city_pref_id', '=', 'm_prefs.pref_id'))
//            ->where('m_pref_id')
//            ->get();
//        dd(compact(['kanas']));

//        $city_groups = DB::table('m_cities')
//            ->select('distinct left(city_kana, 1) as yomi')
//            ->join(DB::raw('(' . $kanas->toSql() .') as kana'), DB::raw('left(city_name, 1)'), '=', 'kana.kana_name')
//            ->orderBy('yomi')
//            ->get();

    $cities = DB::table('m_cities')
      ->select('city_id', 'city_name')
      ->where('city_pref_id', $pref_id)
      ->orderBy('city_kana')
      ->get();
//        dd(compact(['cities']));

    return view('city.index', compact(['pref', 'arr_disp', 'other_areas']));
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
