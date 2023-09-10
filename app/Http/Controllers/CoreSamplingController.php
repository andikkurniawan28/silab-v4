<?php

namespace App\Http\Controllers;

use App\Models\Core;
use App\Models\Config;
use App\Models\CoreCard;
use App\Models\CoreSampling;
use Illuminate\Http\Request;
use App\Models\AnalisaPosbrix;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AplikasiController;

class CoreSamplingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $core = Core::all();
        $core_sampling = CoreSampling::get();
        return view("core_sampling.index", compact("config", "core_sampling", "core"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $core = Core::all();
        $config = Config::run();
        return view("core_sampling.create", compact("config", "core"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has("core_id")){
            $core_id = $request->core_id;
        }

        $count_card     = self::countCard();
        $resource       = AplikasiController::getAntrian($request->data);
        $id             = self::getId($resource);
        $state          = self::checkState($count_card, $id);

        if(CoreSampling::where("analisa_posbrix_id", $id)->count("id") != 0){
            $message = "Truk sudah terdaftar!";
            return self::gagalSimpan($timbang_id, "Sudah Scan!");
        }
        if($state === 1){
            $card = self::getCardFifo();
            self::save($id, $card, $request);
            self::clear($card);
            self::updatePosbrix($id, $resource);
            return self::sukses($timbang_id, "Posbrix ditemukan, integrasi sukses!");
        }
        elseif($state === 2)
        {
            $message = "Kartu sampel belum siap!";
            return self::gagalSimpan($timbang_id, "Kartu sampel belum siap!");
        }
        elseif($state === 3)
        {
            self::createPosbrix($resource);
            $analisa_posbrix_id = AnalisaPosbrix::where("barcode_antrian", $resource["barcode_antrian"])->get()->last()->id;
            $card = self::getCardFifo();
            self::save($analisa_posbrix_id, $card, $request);
            self::clear($card);
            return self::sukses($timbang_id, "Posbrix tidak ditemukan, membuat Posbrix kosongan. Hubungi petugas Posbrix!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoreSampling  $core_sampling
     * @return \Illuminate\Http\Response
     */
    public function show(CoreSampling $core_sampling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoreSampling  $core_sampling
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $core = Core::all();
        $core_sampling = CoreSampling::whereId($id)->get()->last();
        return view("core_sampling.edit", compact("config", "core_sampling", "core"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CoreSampling  $core_sampling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        CoreSampling::whereId($id)->update([
            "rfid" => $request->rfid,
            "core_id" => $request->core_id,
        ]);
        return redirect()->route("core_sampling.index")->with("success", "Core Sampling berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoreSampling  $core_sampling
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CoreSampling::whereId($id)->delete();
        return redirect()->route("core_sampling.index")->with("success", "Core Sampling berhasil dihapus.");
    }

    public static function getId($resource){
        return AnalisaPosbrix::where("spta", $resource["spta"])->get()->last()->id ?? NULL;
    }

    public static function countCard(){
        return CoreCard::count();
    }

    public static function checkState($count_card, $id){
        if($count_card == 0){
            return 2;
        }
        if($id == NULL){
            return 3;
        }
        return 1;
    }

    public static function getCardFifo(){
        return CoreCard::get()->first()->rfid;
    }

    public static function getCardLifo(){
        return CoreCard::get()->last()->rfid;
    }

    public static function save($id, $card, $request){
        CoreSampling::create([
            "analisa_posbrix_id" => $id,
            "user_id" => $request->user_id,
            "core_id" => $request->core_id,
            "rfid" => $card,
        ]);
    }

    public static function save2($id, $card, $request){
        CoreSampling::create([
            "analisa_posbrix_id" => $id,
            "user_id" => $request->user_id,
            "core_id" => 1,
            "rfid" => $card,
        ]);
    }

    public static function clear($card){
        CoreCard::where("rfid", $card)->delete();
    }

    public static function updatePosbrix($id, $resource){
        AnalisaPosbrix::whereId($id)->update([
            "barcode_antrian"   => $resource["barcode_antrian"],
            "register"          => $resource["register"],
            "nopol"             => $resource["nopol"],
            "petani"            => $resource["nama_petani"],
            "kud_id"            => $resource["kud_id"],
            "pospantau_id"      => $resource["pospantau_id"],
            "wilayah_id"        => $resource["wilayah_id"],
        ]);
    }

    public static function createPosbrix($resource){
        AnalisaPosbrix::insert([
            "spta"              => $resource["spta"],
            "barcode_antrian"   => $resource["barcode_antrian"],
            "register"          => $resource["register"],
            "nopol"             => $resource["nopol"],
            "petani"            => $resource["nama_petani"],
            "kud_id"            => $resource["kud_id"],
            "pospantau_id"      => $resource["pospantau_id"],
            "wilayah_id"        => $resource["wilayah_id"],
            "user_id"           => 1,
        ]);
    }

    public static function sukses($timbang_id, $message){
        return view("core_sampling.sukses", compact("timbang_id", "message"));
    }

    public static function gagalSimpan($timbang_id, $message){
        return view("core_sampling.gagal_simpan", compact("timbang_id", "message"));
    }
}
