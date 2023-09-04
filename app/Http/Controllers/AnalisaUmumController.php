<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Material;
use App\Models\AnalisaUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AnalisaUmumStoreRequest;

class AnalisaUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $analisa_umum = AnalisaUmum::where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("analisa_umum.index", compact("config", "analisa_umum"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("analisa_umum.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnalisaUmumStoreRequest $request)
    {
        AnalisaUmum::create($request->all());
        return redirect()->route("analisa_umum.create")->with("success", "Analisa Umum berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnalisaUmum  $analisa_umum
     * @return \Illuminate\Http\Response
     */
    public function show(AnalisaUmum $analisa_umum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnalisaUmum  $analisa_umum
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $analisa_umum = AnalisaUmum::whereId($id)->get()->last();
        return view("analisa_umum.edit", compact("config", "analisa_umum"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnalisaUmum  $analisa_umum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        AnalisaUmum::whereId($id)->update([
            "sample_id" => $request->sample_id,
            "cao" => $request->cao,
            "ph" => $request->ph,
            "turbidity" => $request->turbidity,
            "suhu" => $request->suhu,
        ]);
        return redirect()->route("analisa_umum.index")->with("success", "Analisa Umum berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnalisaUmum  $analisa_umum
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AnalisaUmum::whereId($id)->delete();
        return redirect()->route("analisa_umum.index")->with("success", "Analisa Umum berhasil dihapus.");
    }
}
