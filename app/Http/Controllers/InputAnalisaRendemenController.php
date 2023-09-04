<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Analysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InputAnalisaRendemenController extends Controller
{
    public function index(){
        $config = Config::run();
        $analysis = Analysis::select(["id", "material_id", "created_at", "pbrix", "ppol", "pol", "hk", "rendemen", "ph"])
            ->where("material_id", 3)
            ->where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("analysis.input_analisa_rendemen", compact("config", "analysis"));
    }

    public function edit($id){
        $config = Config::run();
        $analysis = Analysis::whereId($id)->select(["id", "pbrix", "ppol", "pol", "hk", "rendemen", "ph"])->get()->last();
        return view("analysis.input_analisa_rendemen_edit", compact("config", "analysis"));
    }

    public function update(Request $request){
        $ppol = self::hitungPol($request->rendemen, $request->pbrix);
        $hk = self::hitungPol($request->pbrix, $ppol);
        $request->request->add([
            "ppol" => $ppol,
            "hk" => $hk,
        ]);
        Analysis::whereId($request->id)->update([
            "pbrix" => $request->pbrix,
            "ppol" => $request->ppol,
            "pol" => $request->pol,
            "hk" => $request->hk,
            "rendemen" => $request->rendemen,
            "ph" => $request->ph,
        ]);
        return redirect()->route("input_analisa_rendemen")->with("success", "Analisa berhasil disimpan.");
    }

    public static function hitungHk($pbrix, $ppol){
        if($pbrix != null || $ppol != null){
            return ($ppol / $pbrix) * 100;
        } else {
            return null;
        }
    }

    public static function hitungRendemen($pbrix, $ppol){
        if($pbrix != null || $ppol != null){
            return ($ppol- ( 0.4 * ($pbrix - $ppol) ) * 0.7);
        } else {
            return null;
        }
    }

    public static function hitungPol($rendemen, $pbrix){
        return (($rendemen / 0.7) + (0.4 * $pbrix)) / (1 + 0.4);
    }
}
