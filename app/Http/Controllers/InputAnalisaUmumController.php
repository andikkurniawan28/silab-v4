<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Analysis;
use App\Models\AnalisaUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InputAnalisaUmumController extends Controller
{
    public function index(){
        $config = Config::run();
        $material_id = AnalisaUmum::select(["material_id"])->get();
        $analysis = Analysis::select(["id", "material_id", "created_at", "cao", "ph", "turbidity", "suhu"])
            ->whereIn("material_id", $material_id)
            ->where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("analysis.input_analisa_umum", compact("config", "analysis"));
    }

    public function edit($id){
        $config = Config::run();
        $analysis = Analysis::whereId($id)->select(["id", "cao", "ph", "turbidity", "suhu"])->get()->last();
        return view("analysis.input_analisa_umum_edit", compact("config", "analysis"));
    }

    public function update(Request $request){
        Analysis::whereId($request->id)->update([
            "cao" => $request->cao,
            "ph" => $request->ph,
            "turbidity" => $request->turbidity,
            "suhu" => $request->suhu,
        ]);
        return redirect()->route("input_analisa_umum")->with("success", "Analisa berhasil disimpan.");
    }
}
