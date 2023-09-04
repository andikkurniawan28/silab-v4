<?php

namespace App\Http\Controllers;

use App\Models\Core;
use App\Models\Config;
use App\Models\SampleAri;
use Illuminate\Http\Request;

class AplikasiPersiapanAriController extends Controller
{
    public function index(){
        $config = Config::run();
        $kartu = SampleAri::count();
        return view("aplikasi_persiapan_ari.index", compact("config", "kartu"));
    }

    public function process(Request $request){
        $request_validated = $request->validate([
            "rfid" => "required|unique:sample_aris",
        ]);
        SampleAri::create($request_validated);
        return redirect()->back();
    }
}
