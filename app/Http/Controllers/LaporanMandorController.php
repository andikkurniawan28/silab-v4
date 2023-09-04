<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Models\LaporanMandor;

class LaporanMandorController extends Controller
{
    public function index($shift){
        if($shift > 4){
            return redirect()->back()->with("success", "Shift invalid");
        }
        $data = LaporanMandor::prepare($shift);
        $stasiun["pemurnian"] = Material::where("station_id", 3)->select(["id"])->get();
        $stasiun["penguapan"] = Material::where("station_id", 4)->select(["id"])->get();
        $stasiun["drk"] = Material::where("station_id", 5)->select(["id"])->get();
        $stasiun["masakan"] = Material::where("station_id", 6)->select(["id"])->get();
        $stasiun["stroop"] = Material::where("station_id", 7)->select(["id"])->get();
        $stasiun["gula"] = Material::whereIn("station_id", [1,8])->select(["id"])->get();
        $stasiun["tetes"] = Material::where("station_id", 9)->select(["id"])->get();
        $stasiun["ketel"] = Material::where("station_id", 10)->select(["id"])->get();
        return view("laporan_mandor.index", compact("data", "shift", "stasiun"));
    }
}
