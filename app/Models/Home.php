<?php

namespace App\Models;

use App\Models\Sample;
use App\Models\AnalisaAri;
use App\Models\AnalisaCore;
use App\Models\Saccharomat;
use App\Models\Rawsugarinput;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Home extends Model
{
    use HasFactory;

    public static function run(){
        $data["onfarm"] = self::onFarm();
        $data["offfarm"] = self::offFarm();
        return $data;
    }

    public static function offFarm(){
        $data["npp"] = self::getNpp();
        $data["rs_in"] = self::timbangan("rawsugarinputs");
        $data["rs_out"] = self::timbangan("rawsugaroutputs");
        $data["tetes"] = self::timbangan("mollases");
        return $data;
    }

    public static function timbangan($type){
        $timeframe = [
            "time_start",
            "time_siang",
            "time_malam",
            "time_tomorrow",
        ];

        for($i=0; $i<count($timeframe); $i++){
            if($i != 3){
                $data[$i] = DB::table($type)
                    ->where("created_at", ">=", session($timeframe[$i]))
                    ->where("created_at", "<", session($timeframe[$i+1]))
                    ->sum("netto");
            } else {
                $data[$i] = DB::table($type)
                    ->where("created_at", ">=", session($timeframe[0]))
                    ->where("created_at", "<", session($timeframe[3]))
                    ->sum("netto");
            }
        }

        return $data;
    }

    public static function getNpp(){
        $sample["pagi"] =
            Sample::where("material_id", 3)
                ->where("created_at", ">=", session("time_start"))
                ->where("created_at", "<", session("time_siang"))
                ->select(["id"])->get();

        $sample["sore"] =
            Sample::where("material_id", 3)
                ->where("created_at", ">=", session("time_siang"))
                ->where("created_at", "<", session("time_malam"))
                ->select(["id"])->get();

        $sample["malam"] =
            Sample::where("material_id", 3)
                ->where("created_at", ">=", session("time_malam"))
                ->where("created_at", "<", session("time_tomorrow"))
                ->select(["id"])->get();

        $sample["harian"] =
            Sample::where("material_id", 3)
                ->where("created_at", ">=", session("time_start"))
                ->where("created_at", "<", session("time_tomorrow"))
                ->select(["id"])->get();

        $data["pagi"]["rendemen"] = Saccharomat::whereIn("sample_id", $sample["pagi"])->avg("rendemen");
        $data["sore"]["rendemen"] = Saccharomat::whereIn("sample_id", $sample["sore"])->avg("rendemen");
        $data["malam"]["rendemen"] = Saccharomat::whereIn("sample_id", $sample["malam"])->avg("rendemen");
        $data["harian"]["rendemen"] = Saccharomat::whereIn("sample_id", $sample["harian"])->avg("rendemen");

        $data["pagi"]["jumlah"] = count($sample["pagi"]);
        $data["sore"]["jumlah"] = count($sample["sore"]);
        $data["malam"]["jumlah"] = count($sample["malam"]);
        $data["harian"]["jumlah"] = count($sample["harian"]);

        return $data;
    }

    public static function onFarm(){

        $timeframe = [
            "time_start",
            "time_siang",
            "time_malam",
            "time_tomorrow",
        ];

        for($i=0; $i<count($timeframe); $i++){
            if($i != 3){
                $data["posbrix"][$i] =
                AnalisaPosbrix::selectRaw("avg(brix) as value, count(id) as rit")
                    ->where("created_at", ">=", session($timeframe[$i]))
                    ->where("created_at", "<", session($timeframe[$i+1]))
                    ->get()->first();

                $data["core"][$i] =
                AnalisaCore::selectRaw("avg(rendemen) as value, count(id) as rit")
                    ->where("created_at", ">=", session($timeframe[$i]))
                    ->where("created_at", "<", session($timeframe[$i+1]))
                    ->get()->first();

                $data["ari"][$i] =
                AnalisaAri::selectRaw("avg(rendemen) as value, count(id) as rit")
                    ->where("created_at", ">=", session($timeframe[$i]))
                    ->where("created_at", "<", session($timeframe[$i+1]))
                    ->get()->first();

            } else {
                $data["posbrix"][$i] =
                AnalisaPosbrix::selectRaw("avg(brix) as value, count(id) as rit")
                    ->where("created_at", ">=", session($timeframe[0]))
                    ->where("created_at", "<", session($timeframe[3]))
                    ->get()->first();

                $data["core"][$i] =
                AnalisaCore::selectRaw("avg(rendemen) as value, count(id) as rit")
                    ->where("created_at", ">=", session($timeframe[0]))
                    ->where("created_at", "<", session($timeframe[3]))
                    ->get()->first();

                $data["ari"][$i] =
                AnalisaAri::selectRaw("avg(rendemen) as value, count(id) as rit")
                    ->where("created_at", ">=", session($timeframe[0]))
                    ->where("created_at", "<", session($timeframe[3]))
                    ->get()->first();
            }
        }

        return $data;
    }
}
