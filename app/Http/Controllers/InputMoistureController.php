<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Analysis;
use App\Models\Moisture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InputMoistureController extends Controller
{
    public function index(){
        $config = Config::run();
        $material_id = Moisture::select(["material_id"])->get();
        $analysis = Analysis::select(["id", "material_id", "created_at", "moisture", "so2", "bjb"])
            ->whereIn("material_id", $material_id)
            ->where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("analysis.input_moisture", compact("config", "analysis"));
    }

    public function edit($id){
        $config = Config::run();
        $analysis = Analysis::whereId($id)->select(["id", "moisture", "so2", "bjb"])->get()->last();
        return view("analysis.input_moisture_edit", compact("config", "analysis"));
    }

    public function update(Request $request){
        Analysis::whereId($request->id)->update([
            "moisture" => $request->moisture,
            "so2" => $request->so2,
            "bjb" => $request->bjb,
        ]);
        return redirect()->route("input_moisture")->with("success", "Analisa berhasil disimpan.");
    }
}
