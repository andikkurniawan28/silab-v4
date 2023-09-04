<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Analysis;
use App\Models\Saccharomat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InputSaccharomatController extends Controller
{
    public function index(){
        $config = Config::run();
        $material_id = Saccharomat::select(["material_id"])->get();
        $analysis = Analysis::select(["id", "material_id", "created_at", "pbrix", "ppol", "pol", "hk"])
            ->whereIn("material_id", $material_id)
            ->where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("analysis.input_saccharomat", compact("config", "analysis"));
    }

    public function edit($id){
        $config = Config::run();
        $analysis = Analysis::whereId($id)->select(["id", "pbrix", "ppol", "pol", "hk"])->get()->last();
        return view("analysis.input_saccharomat_edit", compact("config", "analysis"));
    }

    public function update(Request $request){
        $hk = self::hitungHk($request->pbrix, $request->ppol);
        $request->request->add(["hk" => $hk]);
        Analysis::whereId($request->id)->update([
            "pbrix" => $request->pbrix,
            "ppol" => $request->ppol,
            "pol" => $request->pol,
            "hk" => $request->hk,
        ]);
        return redirect()->route("input_saccharomat")->with("success", "Analisa berhasil disimpan.");
    }

    public static function hitungHk($pbrix, $ppol){
        if($pbrix != null || $ppol != null){
            return ($ppol / $pbrix) * 100;
        } else {
            return null;
        }
    }
}
