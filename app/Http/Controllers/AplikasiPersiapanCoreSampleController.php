<?php

namespace App\Http\Controllers;

use App\Models\Core;
use App\Models\Config;
use App\Models\SampleCore;
use Illuminate\Http\Request;

class AplikasiPersiapanCoreSampleController extends Controller
{
    public function index($core_id){
        $config = Config::run();
        $name = Core::whereId($core_id)->get()->last()->name;
        $kartu["ek_timur"] = SampleCore::where("core_id", 1)->count();
        $kartu["ek_barat"] = SampleCore::where("core_id", 2)->count();
        $kartu["eb"] = SampleCore::where("core_id", 3)->count();
        return view("aplikasi_persiapan_core_sample.index", compact("config", "name", "core_id", "kartu"));
    }

    public function process(Request $request){
        $request_validated = $request->validate([
            "rfid" => "required|unique:sample_cores",
            "core_id" => "required",
        ]);
        SampleCore::create($request_validated);
        return redirect()->back();
    }
}
