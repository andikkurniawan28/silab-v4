<?php

namespace App\Models;

use App\Models\Method;
use App\Models\Station;
use App\Models\Material;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sample extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function material(){
        return $this->belongsTo(Material::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function saccharomat(){
        return $this->hasOne(Saccharomat::class);
    }

    // public static function serveDataPerStation($station_id){
    //     $materials = Material::where("station_id", $station_id)->select(["id", "name", "method_id"])->get();
    //     for($i=0; $i<count($materials); $i++){
    //         $data[$i]["id"] = $materials[$i]->id;
    //         $data[$i]["method_id"] = $materials[$i]->method_id;
    //         $data[$i]["name"] = $materials[$i]->name;
    //         $data[$i]["analysis"] = self::where("samples.material_id", $materials[$i]->id)
    //             ->where("created_at", ">", session("time_start"))
    //             ->where("created_at", "<=", session("time_end"))
    //             ->orderBy("id", "desc")
    //             ->get();
    //         $data[$i]["method"] = Method::whereId($materials[$i]->method_id)->get()->last()->value;
    //     }
    //     return $data;
    // }

    public static function serveDataPerMaterial($material_id){
        return Sample::select([
                "samples.id as id",
                "samples.created_at as created_at",
                "samples.volume as volume",
                "samples.pan as pan",
                "samples.palung as palung",
                "saccharomats.pbrix as pbrix",
                "saccharomats.ppol as ppol",
                "saccharomats.pol as pol",
                "saccharomats.hk as hk",
                "saccharomats.rendemen as rendemen",
                "coloromats.icumsa as icumsa",
                "moistures.moisture as moisture",
                "analisa_ampas.pol as pol_ampas",
                "analisa_ampas.zat_kering as zk_ampas",
                "analisa_ampas.kadar_air as ka_ampas",
                "analisa_blotongs.zat_kering as zk_blotong",
                "analisa_blotongs.kadar_air as ka_blotong",
                "analisa_ketels.tds as tds",
                "analisa_ketels.ph as ph_ketel",
                "analisa_ketels.kesadahan as kesadahan",
                "analisa_ketels.phospat as phospat",
                "analisa_umums.cao as cao",
                "analisa_umums.ph as ph",
                "analisa_umums.turbidity as turbidity",
                "analisa_umums.suhu as suhu",
                "analisa_khususes.tsai as tsai",
                "analisa_khususes.optical_density as od",
                "analisa_khususes.succrose as succrose",
                "analisa_khususes.glucose as glucose",
                "analisa_khususes.fructose as fructose",
                "analisa_khususes.gula_reduksi as gured",
                "analisa_khususes.kadar_kapur as kadar_kapur",
                "analisa_khususes.kadar_phospat as kadar_phospat",
                "analisa_khususes.preparation_index as pi",
                "analisa_khususes.kadar_sabut as kadar_sabut",
                "analisa_sulphurs.so2 as so2",
                "analisa_sulphurs.bjb as bjb",
                "analisa_lains.bintik_hitam as bintik_hitam",
            ])
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
                ->where("samples.material_id", $material_id)
                ->where("samples.created_at", ">", session("time_start"))
                ->where("samples.created_at", "<=", session("time_end"))
                ->orderBy("samples.id", "desc")
                ->get();
    }

    public static function serveDataPerStation($station_id){
        $data = Material::where("station_id", $station_id)->select(["id", "name", "method_id"])->get();
        for($i=0; $i<count($data); $i++){
            $data[$i]["analysis"] = Sample::select([
                "samples.id as id",
                "samples.created_at as created_at",
                "samples.volume as volume",
                "samples.pan as pan",
                "samples.palung as palung",
                "saccharomats.pbrix as pbrix",
                "saccharomats.ppol as ppol",
                "saccharomats.pol as pol",
                "saccharomats.hk as hk",
                "saccharomats.rendemen as rendemen",
                "coloromats.icumsa as icumsa",
                "moistures.moisture as moisture",
                "analisa_ampas.pol as pol_ampas",
                "analisa_ampas.zat_kering as zk_ampas",
                "analisa_ampas.kadar_air as ka_ampas",
                "analisa_blotongs.zat_kering as zk_blotong",
                "analisa_blotongs.kadar_air as ka_blotong",
                "analisa_ketels.tds as tds",
                "analisa_ketels.ph as ph_ketel",
                "analisa_ketels.kesadahan as kesadahan",
                "analisa_ketels.phospat as phospat",
                "analisa_umums.cao as cao",
                "analisa_umums.ph as ph",
                "analisa_umums.turbidity as turbidity",
                "analisa_umums.suhu as suhu",
                "analisa_khususes.tsai as tsai",
                "analisa_khususes.optical_density as od",
                "analisa_khususes.succrose as succrose",
                "analisa_khususes.glucose as glucose",
                "analisa_khususes.fructose as fructose",
                "analisa_khususes.gula_reduksi as gured",
                "analisa_khususes.kadar_kapur as kadar_kapur",
                "analisa_khususes.kadar_phospat as kadar_phospat",
                "analisa_khususes.preparation_index as pi",
                "analisa_khususes.kadar_sabut as kadar_sabut",
                "analisa_sulphurs.so2 as so2",
                "analisa_sulphurs.bjb as bjb",
                "analisa_lains.bintik_hitam as bintik_hitam",
            ])
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
                ->where("samples.material_id", $data[$i]["id"])
                ->where("samples.created_at", ">", session("time_start"))
                ->where("samples.created_at", "<=", session("time_end"))
                ->orderBy("samples.id", "desc")
                ->get();
        }
        return $data;
    }
}
