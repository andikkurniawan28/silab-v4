<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;
use Illuminate\Support\Facades\DB;

class KoreksiTimbanganController extends Controller
{
    public function index(){
        $config = Config::run();
        return view("koreksi_timbangan.index", compact("config"));
    }

    public function process(Request $request){
        $min_time   = date("Y-m-d 5:00", strtotime($request->date));
        $max_time   = date("Y-m-d H:i", strtotime($min_time . "+24 hours"));
        $created_at = date("Y-m-d 6:00", strtotime($request->date));

        $actual_value = DB::table($request->table)
            ->where("created_at", ">=", $min_time)
            ->where("created_at", "<", $max_time)
            ->sum("netto");

        $yield = $request->value - $actual_value;

        DB::table($request->table)
            ->insert([
                "netto" => $yield,
                "bruto" => 0,
                "tarra" => 0,
                "created_at" => $created_at,
        ]);

        return redirect()->back()->with("success", "Data timbangan berhasil dikoreksi");
    }
}
