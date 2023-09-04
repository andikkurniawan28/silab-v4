<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Analysis;
use App\Models\AnalisaAmpas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InputAnalisaAmpasController extends Controller
{
    public function index(){
        $config = Config::run();
        $material_id = AnalisaAmpas::select(["material_id"])->get();
        $analysis = Analysis::select(["id", "material_id", "created_at", "pol", "kadar_air", "zat_kering", "pol_ampas"])
            ->whereIn("material_id", $material_id)
            ->where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("analysis.input_analisa_ampas", compact("config", "analysis"));
    }

    public function edit($id){
        $config = Config::run();
        $analysis = Analysis::whereId($id)->select(["id", "pol", "kadar_air", "zat_kering", "pol_ampas"])->get()->last();
        return view("analysis.input_analisa_ampas_edit", compact("config", "analysis"));
    }

    public function update(Request $request){
        Analysis::whereId($request->id)->update([
            "pol" => $request->pol,
            "kadar_air" => $request->kadar_air,
            "zat_kering" => $request->zat_kering,
            "pol_ampas" => $request->pol_ampas,
        ]);
        return redirect()->route("input_analisa_ampas")->with("success", "Analisa berhasil disimpan.");
    }
}
