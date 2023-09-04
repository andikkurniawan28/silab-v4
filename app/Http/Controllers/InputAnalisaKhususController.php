<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Analysis;
use App\Models\AnalisaKhusus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InputAnalisaKhususController extends Controller
{
    public function index(){
        $config = Config::run();
        $material_id = AnalisaKhusus::select(["material_id"])->get();
        $analysis = Analysis::select(["id", "material_id", "created_at", "tsai", "kapur", "sabut", "preparation_index", "succrose", "glucose", "fructose", "optical_density", "gula_reduksi"])
            ->whereIn("material_id", $material_id)
            ->where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("analysis.input_analisa_khusus", compact("config", "analysis"));
    }

    public function edit($id){
        $config = Config::run();
        $analysis = Analysis::whereId($id)->select(["id", "tsai", "kapur", "sabut", "preparation_index", "succrose", "glucose", "fructose", "optical_density", "gula_reduksi"])->get()->last();
        return view("analysis.input_analisa_khusus_edit", compact("config", "analysis"));
    }

    public function update(Request $request){
        Analysis::whereId($request->id)->update([
            "tsai" => $request->tsai,
            "kapur" => $request->kapur,
            "sabut" => $request->sabut,
            "preparation_index" => $request->preparation_index,
            "succrose" => $request->succrose,
            "glucose" => $request->glucose,
            "fructose" => $request->fructose,
            "optical_density" => $request->optical_density,
            "gula_reduksi" => $request->gula_reduksi,
        ]);
        return redirect()->route("input_analisa_khusus")->with("success", "Analisa berhasil disimpan.");
    }
}
