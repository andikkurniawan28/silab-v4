<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Analysis;
use App\Models\AnalisaKetel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InputAnalisaKetelController extends Controller
{
    public function index(){
        $config = Config::run();
        $material_id = AnalisaKetel::select(["material_id"])->get();
        $analysis = Analysis::select(["id", "material_id", "created_at", "tds", "ph", "kesadahan", "phospat"])
            ->whereIn("material_id", $material_id)
            ->where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("analysis.input_analisa_ketel", compact("config", "analysis"));
    }

    public function edit($id){
        $config = Config::run();
        $analysis = Analysis::whereId($id)->select(["id", "tds", "ph", "kesadahan", "phospat"])->get()->last();
        return view("analysis.input_analisa_ketel_edit", compact("config", "analysis"));
    }

    public function update(Request $request){
        Analysis::whereId($request->id)->update([
            "tds" => $request->tds,
            "ph" => $request->ph,
            "kesadahan" => $request->kesadahan,
            "phospat" => $request->phospat,
        ]);
        return redirect()->route("input_analisa_ketel")->with("success", "Analisa berhasil disimpan.");
    }
}
