<?php

namespace App\Http\Controllers;

use App\Models\Core;
use App\Models\Config;
use App\Models\Material;
use App\Models\AnalisaCore;
use App\Models\CoreSampling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
// use App\Http\Requests\AnalisaCoreStoreRequest;

class AnalisaCoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $analisa_core = AnalisaCore::where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("analisa_core.index", compact("config", "analisa_core"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $core = Core::all();
        $config = Config::run();
        return view("analisa_core.create", compact("config", "core"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $analisa_posbrix_id = self::getAnalisaPosbrixId($request->rfid);
        if($analisa_posbrix_id === NULL){
            return self::errorRfid();
        }
        $rendemen = self::hitungRendemen($request->brix, $request->pol);
        $request->request->add([
            "analisa_posbrix_id" => $analisa_posbrix_id,
            "rendemen" => $rendemen,
        ]);
        AnalisaCore::create($request->except(["rfid"]));
        return redirect()->route("analisa_core.create")->with("success", "Analisa Core berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnalisaCore  $analisa_core
     * @return \Illuminate\Http\Response
     */
    public function show(AnalisaCore $analisa_core)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnalisaCore  $analisa_core
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $core = Core::all();
        $analisa_core = AnalisaCore::whereId($id)->get()->last();
        return view("analisa_core.edit", compact("config", "core", "analisa_core"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnalisaCore  $analisa_core
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pol = self::hitungPol($request->rendemen, $request->brix);
        $request->request->add(["pol" => $pol]);
        AnalisaCore::whereId($id)->update([
            "brix" => $request->brix,
            "pol" => $request->pol,
            "rendemen" => $request->rendemen,
        ]);
        return redirect()->route("analisa_core.index")->with("success", "Analisa Core berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnalisaCore  $analisa_core
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AnalisaCore::whereId($id)->delete();
        return redirect()->route("analisa_core.index")->with("success", "Analisa Core berhasil dihapus.");
    }

    public static function getAnalisaPosbrixId($rfid){
        return CoreSampling::where("rfid", $rfid)->get()->first()->analisa_posbrix_id ?? NULL;
    }

    public static function hitungRendemen($brix, $pol){
        $faktor_mellase = 0.5;
        $faktor_rendemen = 0.7;
        $koreksi = $faktor_mellase * ($brix - $pol);
        $rendemen = ($pol - $koreksi) * $faktor_rendemen;
        return $rendemen;
    }

    public static function hitungPol($rendemen, $brix){
        return (($rendemen / 0.7) + (0.5 * $brix)) / (1 + 0.5);
    }

    public static function errorRfid(){
        return redirect()->route("analisa_core.create")->with("success", "Error : RFID tidak terdaftar.");
    }
}
