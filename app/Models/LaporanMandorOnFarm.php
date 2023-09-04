<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanMandorOnFarm extends Model
{
    use HasFactory;

    public static function prepare($shift){
        switch($shift){
            case 1 :
                $data["posbrix"] = AnalisaPosbrix::where("created_at", ">=", session("time_start"))
                    ->where("created_at", "<", session("time_siang"))
                    ->select(["spta", "brix", "variety_id", "kawalan_id", "status_id", "created_at"])
                    ->get();


                $data["core_sample"] = AnalisaCore::leftjoin("analisa_posbrixes", "analisa_cores.analisa_posbrix_id", "analisa_posbrixes.id")
                    ->where("analisa_cores.created_at", ">=", session("time_start"))
                    ->where("analisa_cores.created_at", "<", session("time_siang"))
                    ->select([
                        "analisa_posbrixes.barcode_antrian as barcode_antrian",
                        "analisa_posbrixes.spta as spta",
                        "analisa_cores.brix as brix",
                        "analisa_cores.pol as pol",
                        "analisa_cores.rendemen as rendemen",
                        "analisa_cores.created_at as created_at"])
                    ->get();

                $data["ari"] = AnalisaAri::leftjoin("analisa_posbrixes", "analisa_aris.analisa_posbrix_id", "analisa_posbrixes.id")
                    ->where("analisa_aris.created_at", ">=", session("time_start"))
                    ->where("analisa_aris.created_at", "<", session("time_siang"))
                    ->select([
                        "analisa_posbrixes.barcode_antrian as barcode_antrian",
                        "analisa_posbrixes.spta as spta",
                        "analisa_aris.brix as brix",
                        "analisa_aris.pol as pol",
                        "analisa_aris.rendemen as rendemen",
                        "analisa_aris.created_at as created_at"])
                    ->get();

                $data["scoring"] = Scoring::leftjoin("analisa_posbrixes", "scorings.analisa_posbrix_id", "analisa_posbrixes.id")
                    ->where("scorings.created_at", ">=", session("time_start"))
                    ->where("scorings.created_at", "<", session("time_siang"))
                    ->select([
                        "analisa_posbrixes.barcode_antrian as barcode_antrian",
                        "scorings.score as score",
                        "scorings.created_at as created_at"])
                    ->get();
            break;

            case 2 :
                $data["posbrix"] = AnalisaPosbrix::where("created_at", ">=", session("time_siang"))
                    ->where("created_at", "<", session("time_malam"))
                    ->select(["spta", "brix", "variety_id", "kawalan_id", "status_id", "created_at"])
                    ->get();

                $data["core_sample"] = AnalisaCore::leftjoin("analisa_posbrixes", "analisa_cores.analisa_posbrix_id", "analisa_posbrixes.id")
                    ->where("analisa_cores.created_at", ">=", session("time_siang"))
                    ->where("analisa_cores.created_at", "<", session("time_malam"))
                    ->select([
                        "analisa_posbrixes.barcode_antrian as barcode_antrian",
                        "analisa_posbrixes.spta as spta",
                        "analisa_cores.brix as brix",
                        "analisa_cores.pol as pol",
                        "analisa_cores.rendemen as rendemen",
                        "analisa_cores.created_at as created_at"])
                    ->get();

                $data["ari"] = AnalisaAri::leftjoin("analisa_posbrixes", "analisa_aris.analisa_posbrix_id", "analisa_posbrixes.id")
                    ->where("analisa_aris.created_at", ">=", session("time_siang"))
                    ->where("analisa_aris.created_at", "<", session("time_malam"))
                    ->select([
                        "analisa_posbrixes.barcode_antrian as barcode_antrian",
                        "analisa_posbrixes.spta as spta",
                        "analisa_aris.brix as brix",
                        "analisa_aris.pol as pol",
                        "analisa_aris.rendemen as rendemen",
                        "analisa_aris.created_at as created_at"])
                    ->get();

                $data["scoring"] = Scoring::leftjoin("analisa_posbrixes", "scorings.analisa_posbrix_id", "analisa_posbrixes.id")
                    ->where("scorings.created_at", ">=", session("time_siang"))
                    ->where("scorings.created_at", "<", session("time_malam"))
                    ->select([
                        "analisa_posbrixes.barcode_antrian as barcode_antrian",
                        "scorings.score as score",
                        "scorings.created_at as created_at"])
                    ->get();
            break;

            case 3 :
                $data["posbrix"] = AnalisaPosbrix::where("created_at", ">=", session("time_malam"))
                    ->where("created_at", "<", session("time_tomorrow"))
                    ->select(["spta", "brix", "variety_id", "kawalan_id", "status_id", "created_at"])
                    ->get();

                $data["core_sample"] = AnalisaCore::leftjoin("analisa_posbrixes", "analisa_cores.analisa_posbrix_id", "analisa_posbrixes.id")
                    ->where("analisa_cores.created_at", ">=", session("time_malam"))
                    ->where("analisa_cores.created_at", "<", session("time_tomorrow"))
                    ->select([
                        "analisa_posbrixes.barcode_antrian as barcode_antrian",
                        "analisa_posbrixes.spta as spta",
                        "analisa_cores.brix as brix",
                        "analisa_cores.pol as pol",
                        "analisa_cores.rendemen as rendemen",
                        "analisa_cores.created_at as created_at"])
                    ->get();

                $data["ari"] = AnalisaAri::leftjoin("analisa_posbrixes", "analisa_aris.analisa_posbrix_id", "analisa_posbrixes.id")
                    ->where("analisa_aris.created_at", ">=", session("time_malam"))
                    ->where("analisa_aris.created_at", "<", session("time_tomorrow"))
                    ->select([
                        "analisa_posbrixes.barcode_antrian as barcode_antrian",
                        "analisa_posbrixes.spta as spta",
                        "analisa_aris.brix as brix",
                        "analisa_aris.pol as pol",
                        "analisa_aris.rendemen as rendemen",
                        "analisa_aris.created_at as created_at"])
                    ->get();

                $data["scoring"] = Scoring::leftjoin("analisa_posbrixes", "scorings.analisa_posbrix_id", "analisa_posbrixes.id")
                    ->where("scorings.created_at", ">=", session("time_malam"))
                    ->where("scorings.created_at", "<", session("time_tomorrow"))
                    ->select([
                        "analisa_posbrixes.barcode_antrian as barcode_antrian",
                        "scorings.score as score",
                        "scorings.created_at as created_at"])
                    ->get();

            case 4 :
                $data["posbrix"] = AnalisaPosbrix::where("created_at", ">=", session("time_start"))
                    ->where("created_at", "<", session("time_tomorrow"))
                    ->select(["spta", "brix", "variety_id", "kawalan_id", "status_id", "created_at"])
                    ->get();

                $data["core_sample"] = AnalisaCore::leftjoin("analisa_posbrixes", "analisa_cores.analisa_posbrix_id", "analisa_posbrixes.id")
                    ->where("analisa_cores.created_at", ">=", session("time_start"))
                    ->where("analisa_cores.created_at", "<", session("time_tomorrow"))
                    ->select([
                        "analisa_posbrixes.barcode_antrian as barcode_antrian",
                        "analisa_posbrixes.spta as spta",
                        "analisa_cores.brix as brix",
                        "analisa_cores.pol as pol",
                        "analisa_cores.rendemen as rendemen",
                        "analisa_cores.created_at as created_at"])
                    ->get();

                $data["ari"] = AnalisaAri::leftjoin("analisa_posbrixes", "analisa_aris.analisa_posbrix_id", "analisa_posbrixes.id")
                    ->where("analisa_aris.created_at", ">=", session("time_start"))
                    ->where("analisa_aris.created_at", "<", session("time_tomorrow"))
                    ->select([
                        "analisa_posbrixes.barcode_antrian as barcode_antrian",
                        "analisa_posbrixes.spta as spta",
                        "analisa_aris.brix as brix",
                        "analisa_aris.pol as pol",
                        "analisa_aris.rendemen as rendemen",
                        "analisa_aris.created_at as created_at"])
                    ->get();

                $data["scoring"] = Scoring::leftjoin("analisa_posbrixes", "scorings.analisa_posbrix_id", "analisa_posbrixes.id")
                    ->where("scorings.created_at", ">=", session("time_start"))
                    ->where("scorings.created_at", "<", session("time_tomorrow"))
                    ->select([
                        "analisa_posbrixes.barcode_antrian as barcode_antrian",
                        "scorings.score as score",
                        "scorings.created_at as created_at"])
                    ->get();
            break;
        }
        return $data;
    }
}
