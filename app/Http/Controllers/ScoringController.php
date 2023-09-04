<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Scoring;
use App\Models\AnalisaAri;
use App\Models\AnalisaCore;
use App\Models\RafaksiValue;
use Illuminate\Http\Request;
use App\Models\AnalisaPosbrix;
use App\Models\RendemenNppAcuan;
use Illuminate\Support\Facades\Session;

class ScoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $scoring = Scoring::where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("scoring.index", compact("config", "scoring"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("scoring.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $analisa_posbrix_id = self::getAnalisaPosbrixId($request);
        $rafaksi_mbs = self::rafaksiMbs($request);
        $rendemen_ari = self::rendemenAri($analisa_posbrix_id);
        $delta_thd_npp = self::deltaTerhadapNpp($rendemen_ari);
        $rafaksi_ari = self::rafaksiAri($delta_thd_npp);
        $score = self::scoredAs($rafaksi_mbs, $rafaksi_ari);
        if($analisa_posbrix_id != NULL){
            $request->request->add([
                "analisa_posbrix_id" => $analisa_posbrix_id,
                "rafaksi_mbs" => $rafaksi_mbs,
                "rendemen_ari" => $rendemen_ari,
                "delta_thd_npp" => $delta_thd_npp,
                "rafaksi_ari" => $rafaksi_ari,
                "score" => $score,
            ]);
            Scoring::create($request->except(["barcode_antrian"]));
            return redirect()->back()->with("success", "Sistem merekomendasikan rafaksi {$score}%");
        } else {
            return redirect()->back()->with("success", "Error : Antrian tidak ditemukan di Silab");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scoring  $scoring
     * @return \Illuminate\Http\Response
     */
    public function show(Scoring $scoring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scoring  $scoring
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $scoring = Scoring::whereId($id)->get()->last();
        return view("scoring.edit", compact("config", "scoring"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scoring  $scoring
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $analisa_posbrix_id = $request->analisa_posbrix_id;
        $rafaksi_mbs = self::rafaksiMbs($request);
        $rendemen_ari = self::rendemenAri($analisa_posbrix_id);
        $delta_thd_npp = self::deltaTerhadapNpp($rendemen_ari);
        $rafaksi_ari = self::rafaksiAri($delta_thd_npp);
        $score = self::scoredAs($rafaksi_mbs, $rafaksi_ari);
        $request->request->add([
            "analisa_posbrix_id" => $analisa_posbrix_id,
            "rafaksi_mbs" => $rafaksi_mbs,
            "rendemen_ari" => $rendemen_ari,
            "delta_thd_npp" => $delta_thd_npp,
            "rafaksi_ari" => $rafaksi_ari,
            "score" => $score,
        ]);
        Scoring::whereId($id)->update($request->except([
            "_token", "_method", "analisa_posbrix_id"
        ]));
        return redirect()->back()->with("success", "Sistem merekomendasikan rafaksi {$score}%");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scoring  $scoring
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Scoring::whereId($id)->delete();
        return redirect()->back()->with("success", "Scoring berhasil dihapus");
    }

    public static function rafaksiMbs($request){
        $rafaksi_value = RafaksiValue::get()->last();
        $rafaksi["daduk"] = $request->daduk * $rafaksi_value->daduk;
        $rafaksi["akar"] = $request->akar * $rafaksi_value->akar;
        $rafaksi["tali_pucuk"] = $request->tali_pucuk * $rafaksi_value->tali_pucuk;
        $rafaksi["sogolan"] = $request->sogolan * $rafaksi_value->sogolan;
        $rafaksi["pucuk"] = $request->pucuk * $rafaksi_value->pucuk;
        $rafaksi["tebu_muda"] = $request->tebu_muda * $rafaksi_value->tebu_muda;
        $rafaksi["lelesan"] = $request->lelesan * $rafaksi_value->lelesan;
        $rafaksi["terbakar"] = $request->terbakar * $rafaksi_value->terbakar;
        if($request->tebu_muda > 0 || $request->lelesan > 0 || $request->terbakar > 0){
            return 50;
        } else {
            return array_sum($rafaksi);
        }
    }

    public static function getAnalisaPosbrixId($request){
        return AnalisaPosbrix::where("barcode_antrian", $request->barcode_antrian)->get()->last()->id ?? NULL;
    }

    public static function rendemenAri($analisa_posbrix_id){
        $rendemen_core = AnalisaCore::where("analisa_posbrix_id", $analisa_posbrix_id)->get()->last()->rendemen ?? 0;
        $rendemen_gil_mini = AnalisaAri::where("analisa_posbrix_id", $analisa_posbrix_id)->get()->last()->rendemen ?? 0;
        $faktor_core = 5;
        $faktor_gil_mini = 100 - $faktor_core;
        $validitas_core = ($faktor_core/100) * $rendemen_core ?? 0;
        $validitas_gil_mini = ($faktor_gil_mini/100) * $rendemen_gil_mini ?? 0;
        return number_format($validitas_core + $validitas_gil_mini, 2);
    }

    public static function deltaTerhadapNpp($rendemen_ari){
        $rendemen_npp = RendemenNppAcuan::get()->last()->value;
        return number_format($rendemen_ari - $rendemen_npp, 2);
    }

    public static function rafaksiAri($delta_thd_npp){
        if($delta_thd_npp > 1.00){
            return 0.15;
        }
        elseif($delta_thd_npp > 0.50 && $delta_thd_npp <= 1.00){
            return 0.10;
        }
        elseif($delta_thd_npp > 0.00 && $delta_thd_npp <= 0.50){
            return 0.05;
        }
        elseif($delta_thd_npp > -0.50 && $delta_thd_npp <= 0.00){
            return -0.05;
        }
        elseif($delta_thd_npp > -1.00 && $delta_thd_npp <= -0.50){
            return -0.10;
        }
        elseif($delta_thd_npp <= -1.00){
            return -0.15;
        }
    }

    public function scoredAs($rafaksi_mbs, $rafaksi_ari){
        return $rafaksi_mbs - $rafaksi_ari;
    }
}
