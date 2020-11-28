<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class m_StreetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($town_id)
    {
        //
        $town = DB::table('m_towns')
            ->select('town_id', 'town_name', 'city_id', 'city_name', 'pref_id', 'pref_name')
            ->join('m_cities', 'm_towns.town_city_id', '=', 'm_cities.city_id')
            ->join('m_prefs', 'm_cities.city_pref_id', '=', 'm_prefs.pref_id')
            ->where('town_id', '=', $town_id)
            ->first();
        //dd(compact(['town']));

        $streets = DB::table('m_streets')
            ->where('street_town_id', '=', $town_id)
            ->orderBy('street_id')
            ->get();
        //dd(compact(['streets']));

        return view('streets.index', compact(['town', 'streets']));
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
