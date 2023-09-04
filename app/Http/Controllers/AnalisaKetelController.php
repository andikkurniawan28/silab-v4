<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Material;
use App\Models\AnalisaKetel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AnalisaKetelStoreRequest;

class AnalisaKetelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $analisa_ketel = AnalisaKetel::where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("analisa_ketel.index", compact("config", "analisa_ketel"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("analisa_ketel.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnalisaKetelStoreRequest $request)
    {
        AnalisaKetel::create($request->all());
        return redirect()->route("analisa_ketel.create")->with("success", "Analisa Ketel berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnalisaKetel  $analisa_ketel
     * @return \Illuminate\Http\Response
     */
    public function show(AnalisaKetel $analisa_ketel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnalisaKetel  $analisa_ketel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $analisa_ketel = AnalisaKetel::whereId($id)->get()->last();
        return view("analisa_ketel.edit", compact("config", "analisa_ketel"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnalisaKetel  $analisa_ketel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        AnalisaKetel::whereId($id)->update([
            "sample_id" => $request->sample_id,
            "tds" => $request->tds,
            "ph" => $request->ph,
            "kesadahan" => $request->kesadahan,
            "phospat" => $request->phospat,
        ]);
        return redirect()->route("analisa_ketel.index")->with("success", "Analisa Ketel berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnalisaKetel  $analisa_ketel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AnalisaKetel::whereId($id)->delete();
        return redirect()->route("analisa_ketel.index")->with("success", "Analisa Ketel berhasil dihapus.");
    }
}
