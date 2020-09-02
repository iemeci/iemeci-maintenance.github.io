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
        $distance = '6371 * acos(
              cos(radians(?))
              * cos(radians(shop_address_lat))
              * cos(radians(shop_address_lng) - radians(?))
              + sin(radians(?))
              * sin(radians(shop_address_lat))
            )';

        // 現在地
        $lat = (float) $request->input('lat');
        $lng = (float) $request->input('lng');

        if($lat and $lng) {
            // 現在地
            $url = "https://maps.googleapis.com/maps/api/geocode/json?language=ja&latlng=" . $lat . "," . $lng . "&key=" . 'AIzaSyC7mGPxgE9M6hkvK7lboY6GCnAxIGjNccU';
            $json = json_decode(file_get_contents($url))->results;
            $formatted_address = $json[0]->formatted_address;
            preg_match("/^.*?、〒([0-9]{3}-[0-9]{4})\s(.*)/", $formatted_address, $post_address);
        }


        // 検索
        $shops = DB::table('shops')
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
                $distance ."
                 as distance
                ", [$lat, $lng, $lat])
            ->whereRaw('shop_url_d_delivery is not null  or shop_url_rakuten_delivery is not null and ' .
                $distance . '< 5',  [$lat, $lng, $lat])
            ->orderByRaw('shop_score desc ,' . $distance, [$lat, $lng, $lat])
            ->paginate(10);
//        dd(compact('shops'));

        return view('shop.index', compact(['shops', 'post_address', 'lat', 'lng']));
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
