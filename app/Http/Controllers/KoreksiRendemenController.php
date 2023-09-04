<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;
use App\Models\AnalisaAri;

class KoreksiRendemenController extends Controller
{
    public function index(){
        $config = Config::run();
        return view("koreksi_rendemen.index", compact("config"));
    }

    public function process(Request $request){
        $ari_all = self::getAnalisaAriByDate($request);
        foreach($ari_all as $ari){
            $ari->rendemen_after = self::addRendemenWith($request->addition, $ari->id);
            $ari->pol_after = self::generatePercentPol($ari->rendemen_after, $ari->brix);
            self::updateRendemenAndPol($ari->rendemen_after, $ari->pol_after, $ari->id);
        }
        return redirect()->back()->with("success", "Rendemen ARI has been updated!");
    }

    public static function getAnalisaAriByDate($request){
        $date_start = $request->date;
        $date_end = date("Y-m-d", strtotime($date_start . "+24 hours"));
        return AnalisaAri::where("created_at", ">=", $date_start." 05:00:00")
            ->where("created_at", "<", $date_end." 05:00:00")
            ->get();
    }

    public static function addRendemenWith($addition, $ari_id){
        $rendemen_before = self::getRendemenFromAnalisaAriId($ari_id);
        $rendemen_after = $rendemen_before + $addition;
        return $rendemen_after;
    }

    public static function generatePercentPol($rendemen, $brix){
        return (($rendemen / 0.7) + (0.5 * $brix)) / (1 + 0.5);
    }

    public static function updateRendemenAndPol($rendemen, $pol, $ari_id){
        AnalisaAri::whereId($ari_id)->update([
            "pol" => $pol,
            "rendemen" => $rendemen,
        ]);
    }
}
