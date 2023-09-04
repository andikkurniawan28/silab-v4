<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Scoring;
use App\Models\AnalisaAri;
use App\Models\AnalisaCore;
use Illuminate\Http\Request;
use App\Models\AnalisaPosbrix;

class MonitoringOnFarmController extends Controller
{
    public static function index($station_id){
        $config = Config::run();
        $data = self::serve($station_id);
        $name = self::name($station_id);
        return view("monitoring-onfarm.index", compact("config", "data", "station_id", "name"));
    }

    public static function serve($station_id){
        if($station_id == 0){
            $data = AnalisaPosbrix::where("created_at", ">=", session("time_start"))
                ->where("created_at", "<", session("time_end"))
                ->get();
        } elseif($station_id == 1) {
            $data = AnalisaCore::where("created_at", ">=", session("time_start"))
                ->where("created_at", "<", session("time_end"))
                ->get();
        } elseif($station_id == 2) {
            $data = AnalisaAri::where("created_at", ">=", session("time_start"))
                ->where("created_at", "<", session("time_end"))
                ->get();
        } elseif($station_id == 3) {
            $data = Scoring::where("created_at", ">=", session("time_start"))
                ->where("created_at", "<", session("time_end"))
                ->get();
        }
        return $data;
    }

    public static function name($station_id){
        if($station_id == 0){
            return "Posbrix";
        } elseif($station_id == 1) {
            return "Core Sample";
        } elseif($station_id == 2) {
            return "ARI";
        } elseif($station_id == 3) {
            return "Scoring";
        }
    }
}
