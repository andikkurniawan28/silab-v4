<?php

namespace App\Http\Controllers;

use App\Models\PDE;
use App\Models\Timbang;
use App\Models\Config;
use App\Models\Onfarm;
use App\Models\SampleARI;
use Illuminate\Http\Request;

class AplikasiTapAriController extends Controller
{
    public function index($timbang_id){
        $config = Config::run();
        $name = Timbang::whereId($timbang_id)->get()->last()->name;
        return view("aplikasi_tap_ari.index", compact("config", "name", "timbang_id"));
    }

    public function process(Request $request){
        return self::isiKartu($request);
    }

    public static function isiKartu($request){
        if(self::cekGelas($request) == 0){
            return self::gelasBelumSiap();
        } else {
            $data = PDE::generate($request->rfid);
            if(self::cekApakahSudahTimbang($data) != 0){
                $id = self::cekId($data);
                self::update($id, $request, $data);
                return self::sukses();
            } else {
                return self::telahTerdaftar();
            }
        }
    }

    public static function cekGelas($request){
        return SampleARI::count();
    }

    public static function gelasBelumSiap(){
        return redirect()->back()->with("success", "Error : Gelas belum ready!");
    }

    public static function cekApakahSudahTimbang($data){
        return Onfarm::where("spta", $data["spta"])->where("rfid_ari", NULL)->count();
    }

    public static function cekId($data){
        return Onfarm::where("spta", $data["spta"])->get()->last()->id;
    }

    public static function update($id, $request, $data){
        $rfid = SampleARI::get()->first()->rfid;
        $sample_id = SampleARI::where("rfid", $rfid)->get()->first()->id;
        Onfarm::whereId($id)->update([
            "rfid_ari" => $rfid,
            "ari_at" => date("Y-m-d H:i:s"),
            "timbang_id" => $request->timbang_id,
            "barcode_antrian" => $data["barcode_antrian"],
            "register" => $data["register"],
            "petani" => $data["nama_petani"],
            "kud_id" => $data["kud"],
            "pospantau_id" => $data["pospantau"],
            "wilayah_id" => $data["wilayah"],
        ]);
        SampleARI::whereId($sample_id)->delete();
    }

    public static function sukses(){
        return redirect()->back()->with("success", "Sukses!");
    }

    public static function telahTerdaftar(){
        return redirect()->back()->with("success", "Error : Anda telah terdaftar!");
    }
}
