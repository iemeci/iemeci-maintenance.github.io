<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;

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
        $distance = '6371 * acos( -- kmの場合は6371、mileの場合は3959
              cos(radians(?))
              * cos(radians(shop_address_lat))
              * cos(radians(shop_address_lng) - radians(?))
              + sin(radians(?))
              * sin(radians(shop_address_lat))
            )';

        // 現在地
        $lat = (float) $request->input('lat');
        $lng = (float) $request->input('lng');
//        dd([$lat, $lng]);

        // dd($request);
        $shops = DB::table('shops')
            ->selectRaw("
                shop_id,
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
                $distance ."
                 as distance
                ", [$lat, $lng, $lat])
//            ->whereRaw($distance . '< 6',  [$lat, $lng, $lat])
            ->orderByRaw($distance, [$lat, $lng, $lat])
            ->paginate(10);
//        dd(compact('shops'));

        return view('shop.index', compact('shops'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
