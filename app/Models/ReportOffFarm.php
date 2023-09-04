<?php

namespace App\Models;

use session;
use App\Models\Balance;
use App\Models\Mollase;
use App\Models\Analysis;
use App\Models\Keliling;
use App\Models\Material;
use App\Models\Rawsugarinput;
use App\Models\Rawsugaroutput;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReportOffFarm extends Model
{
    use HasFactory;

    public static function prepare(){
        $material = Material::select(["name", "id"])->orderBy("id", "asc")->get();
        for($i=0; $i<count($material); $i++){
            $material[$i]["data"] = Sample::where("samples.material_id", $material[$i]["id"])
                ->where("samples.created_at", ">=", session("time_start"))
                ->where("samples.created_at", "<", session("time_end"))
                ->select(DB::raw("
                    count(samples.id) jumlah,
                    count(samples.pan) pan,
                    sum(samples.volume) volume,
                    avg(saccharomats.pbrix) pbrix,
                    avg(saccharomats.ppol) ppol,
                    avg(saccharomats.pol) pol,
                    avg(saccharomats.hk) hk,
                    avg(saccharomats.rendemen) rendemen,
                    avg(coloromats.icumsa) icumsa,
                    avg(moistures.moisture) moisture,
                    avg(analisa_ampas.kadar_air) ka_ampas,
                    avg(analisa_ampas.zat_kering) zk_ampas,
                    avg(analisa_ampas.pol) pol_ampas,
                    avg(analisa_blotongs.kadar_air) ka_blotong,
                    avg(analisa_blotongs.zat_kering) zk_blotong,
                    avg(analisa_umums.suhu) suhu,
                    avg(analisa_umums.ph) ph,
                    avg(analisa_umums.cao) cao,
                    avg(analisa_umums.turbidity) turbidity,
                    avg(analisa_ketels.tds) tds,
                    avg(analisa_ketels.ph) ph_ketel,
                    avg(analisa_ketels.kesadahan) kesadahan,
                    avg(analisa_ketels.phospat) phospat,
                    avg(analisa_sulphurs.so2) so2,
                    avg(analisa_sulphurs.bjb) bjb,
                    avg(analisa_khususes.tsai) tsai,
                    avg(analisa_khususes.kadar_kapur) kapur,
                    avg(analisa_khususes.kadar_sabut) sabut,
                    avg(analisa_khususes.preparation_index) preparation_index,
                    avg(analisa_khususes.succrose) succrose,
                    avg(analisa_khususes.glucose) glucose,
                    avg(analisa_khususes.fructose) fructose,
                    avg(analisa_khususes.optical_density) optical_density,
                    avg(analisa_khususes.gula_reduksi) gula_reduksi
                "))
                ->leftjoin("saccharomats", "samples.id", "saccharomats.sample_id")
                ->leftjoin("coloromats", "samples.id", "coloromats.sample_id")
                ->leftjoin("moistures", "samples.id", "moistures.sample_id")
                ->leftjoin("analisa_ampas", "samples.id", "analisa_ampas.sample_id")
                ->leftjoin("analisa_blotongs", "samples.id", "analisa_blotongs.sample_id")
                ->leftjoin("analisa_ketels", "samples.id", "analisa_ketels.sample_id")
                ->leftjoin("analisa_umums", "samples.id", "analisa_umums.sample_id")
                ->leftjoin("analisa_khususes", "samples.id", "analisa_khususes.sample_id")
                ->leftjoin("analisa_sulphurs", "samples.id", "analisa_sulphurs.sample_id")
                ->leftjoin("analisa_lains", "samples.id", "analisa_lains.sample_id")
                ->first();
        }
        return $material;
    }

    public static function timbangan(){
        $data["tetes"] = Mollase::where("created_at", ">=", session("time_start"))
            ->where("created_at", "<", session("time_end"))
            ->sum("netto");

        $data["rs_in"] = Rawsugarinput::where("created_at", ">=", session("time_start"))
            ->where("created_at", "<", session("time_end"))
            ->sum("netto");

        $data["rs_out"] = Rawsugaroutput::where("created_at", ">=", session("time_start"))
            ->where("created_at", "<", session("time_end"))
            ->sum("netto");

        $data["balance"] = Balance::where("balances.created_at", ">=", session("time_start"))
            ->where("balances.created_at", "<", session("time_end"))
            ->leftjoin("imbibitions", "balances.created_at", "imbibitions.created_at")
            ->select(DB::raw("
                    sum(balances.tebu) tebu,
                    sum(balances.flow_nm) flow_nm,
                    sum(imbibitions.flow_imb) flow_imb
                    "))
            ->first();


        return $data;
    }
}
