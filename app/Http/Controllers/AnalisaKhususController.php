<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Material;
use App\Models\AnalisaKhusus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AnalisaKhususStoreRequest;

class AnalisaKhususController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $analisa_khusus = AnalisaKhusus::where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("analisa_khusus.index", compact("config", "analisa_khusus"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("analisa_khusus.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnalisaKhususStoreRequest $request)
    {
        AnalisaKhusus::create($request->all());
        return redirect()->route("analisa_khusus.create")->with("success", "Analisa Khusus berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnalisaKhusus  $analisa_khusus
     * @return \Illuminate\Http\Response
     */
    public function show(AnalisaKhusus $analisa_khusus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnalisaKhusus  $analisa_khusus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $analisa_khusus = AnalisaKhusus::whereId($id)->get()->last();
        return view("analisa_khusus.edit", compact("config", "analisa_khusus"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnalisaKhusus  $analisa_khusus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        AnalisaKhusus::whereId($id)->update([
            "sample_id" => $request->sample_id,
            "tsai" => $request->tsai,
            "optical_density" => $request->optical_density,
            "succrose" => $request->succrose,
            "glucose" => $request->glucose,
            "fructose" => $request->fructose,
            "gula_reduksi" => $request->gula_reduksi,
            "kadar_kapur" => $request->kadar_kapur,
            "kadar_phospat" => $request->kadar_phospat,
            "preparation_index" => $request->preparation_index,
            "kadar_sabut" => $request->kadar_sabut,
        ]);
        return redirect()->route("analisa_khusus.index")->with("success", "Analisa Khusus berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnalisaKhusus  $analisa_khusus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AnalisaKhusus::whereId($id)->delete();
        return redirect()->route("analisa_khusus.index")->with("success", "Analisa Khusus berhasil dihapus.");
    }
}
