<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Station;
use Illuminate\Http\Request;
use App\Http\Requests\StationStoreRequest;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $station = Station::select(["id", "name"])->limit(1000)->orderBy("id", "desc")->get();
        return view("station.index", compact("config", "station"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("station.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StationStoreRequest $request)
    {
        Station::create($request->all());
        return redirect()->route("station.index")->with("success", "Stasiun berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function show(Station $station)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $station = Station::whereId($id)->select(["id", "name"])->get()->last();
        return view("station.edit", compact("config", "station"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Station::whereId($id)->update([
            "name" => $request->name,
        ]);
        return redirect()->route("station.index")->with("success", "Stasiun berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Station::whereId($id)->delete();
        return redirect()->route("station.index")->with("success", "Stasiun berhasil dihapus.");
    }
}
