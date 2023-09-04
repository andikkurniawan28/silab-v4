<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Faktor;
use App\Models\Material;
use App\Models\Saccharomat;
use App\Models\AnalisaAmpas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AnalisaAmpasStoreRequest;

class AnalisaAmpasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $analisa_ampas = AnalisaAmpas::where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("analisa_ampas.index", compact("config", "analisa_ampas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("analisa_ampas.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnalisaAmpasStoreRequest $request)
    {
        $kadar_air = self::hitungKadarAir($request->zat_kering);
        $pol = self::hitungPol($kadar_air, $request->sample_id);
        $request->request->add([
            "kadar_air" => $kadar_air,
            "pol" => $pol,
        ]);
        AnalisaAmpas::create($request->all());
        return redirect()->route("analisa_ampas.create")->with("success", "Analisa Ampas berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnalisaAmpas  $analisa_ampas
     * @return \Illuminate\Http\Response
     */
    public function show(AnalisaAmpas $analisa_ampas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnalisaAmpas  $analisa_ampas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $analisa_ampas = AnalisaAmpas::whereId($id)->get()->last();
        return view("analisa_ampas.edit", compact("config", "analisa_ampas"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnalisaAmpas  $analisa_ampas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kadar_air = self::hitungKadarAir($request->zat_kering);
        $pol = self::hitungPol($kadar_air, $request->sample_id);
        AnalisaAmpas::whereId($id)->update([
            "sample_id" => $request->sample_id,
            "zat_kering" => $request->zat_kering,
            "kadar_air" => $kadar_air,
            "pol" => $pol,
        ]);
        return redirect()->route("analisa_ampas.index")->with("success", "Analisa Ampas berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnalisaAmpas  $analisa_ampas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AnalisaAmpas::whereId($id)->delete();
        return redirect()->route("analisa_ampas.index")->with("success", "Analisa Ampas berhasil dihapus.");
    }

    public static function hitungKadarAir($zat_kering){
        return 100 - $zat_kering;
    }

    public static function hitungPol($kadar_air, $sample_id){
        $faktor = Faktor::get()->last()->faktor_analisa_ampas;
        $pol = Saccharomat::where("sample_id", $sample_id)->get()->last()->pol ?? NULL;
        if($pol == NULL){
            return NULL;
        } else {
            $pol_ampas = (($pol/2) * 0.0286 * ((10000 + $kadar_air)/100)*2.5) + $faktor;
            return $pol_ampas;
        }
    }
}
