<?php

namespace App\Http\Controllers;

use App\Models\PDE;
use App\Models\Core;
use App\Models\Config;
use App\Models\Onfarm;
use App\Models\SampleCore;
use Illuminate\Http\Request;

class AplikasiTapCoreSampleController extends Controller
{
    public function index($core_id){
        $config = Config::run();
        $name = Core::whereId($core_id)->get()->last()->name;
        return view("aplikasi_tap_core_sample.index", compact("config", "name", "core_id"));
    }

    public function process(Request $request){
        return self::isiKartu($request);
    }

    public static function isiKartu($request){
        if(self::cekGelas($request) == 0){
            return self::gelasBelumSiap();
        } else {
            $data = PDE::generate($request->rfid);
            if(self::cekApakahSudahCore($data) != 0){
                $id = self::cekId($data);
                self::update($id, $request, $data);
                return self::sukses();
            } else {
                return self::telahTerdaftar();
            }
        }
    }

    public static function cekGelas($request){
        return SampleCore::where("core_id", $request->core_id)->count();
    }

    public static function gelasBelumSiap(){
        return redirect()->back()->with("success", "Error : Gelas belum ready!");
    }

    public static function cekApakahSudahCore($data){
        return Onfarm::where("spta", $data["spta"])->where("rfid_core_sample", NULL)->count();
    }

    public static function cekId($data){
        return Onfarm::where("spta", $data["spta"])->get()->last()->id;
    }

    public static function update($id, $request, $data){
        $rfid = SampleCore::where("core_id", $request->core_id)->get()->first()->rfid;
        $sample_id = SampleCore::where("rfid", $rfid)->get()->first()->id;
        Onfarm::whereId($id)->update([
            "rfid_core_sample" => $rfid,
            "core_at" => date("Y-m-d H:i:s"),
            "core_id" => $request->core_id,
            "barcode_antrian" => $data["barcode_antrian"],
            "register" => $data["register"],
            "petani" => $data["nama_petani"],
            "kud_id" => $data["kud"],
            "pospantau_id" => $data["pospantau"],
            "wilayah_id" => $data["wilayah"],
        ]);
        SampleCore::whereId($sample_id)->delete();
    }

    public static function sukses(){
        return redirect()->back()->with("success", "Sukses!");
    }

    public static function telahTerdaftar(){
        return redirect()->back()->with("success", "Error : Anda telah terdaftar!");
    }
}
