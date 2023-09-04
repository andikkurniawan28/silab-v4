<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use App\Models\AnalisaPosbrix;

class CariDataController extends Controller
{
    public static function index(){
        $config = Config::run();
        return view("cari_data.index", compact("config"));
    }

    public static function process(Request $request){
        $config = Config::run();
        if($request->identity == "SPTA"){
            $data = AnalisaPosbrix::where("spta", $request->data)->get();
        } else if($request->identity == "Antrian"){
            $data = AnalisaPosbrix::where("barcode_antrian", $request->data)->get();
        } else if($request->identity == "Register"){
            $data = AnalisaPosbrix::where("register", $request->data)->get();
        } else if($request->identity == "Nopol"){
            $data = AnalisaPosbrix::where("nopol", $request->data)->get();
        } else if($request->identity == "Petani"){
            $data = AnalisaPosbrix::where("petani", $request->data)->get();
        }
        return view("cari_data.process", compact("config", "data"));
    }
}
