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
// use App\Http\Requests\CoreSamplingStoreRequest;

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
        // Hitung kartu yang tersedia
        $count_card = self::countCard();

        // Panggil API PDE
        $resource = AplikasiController::getAntrian($request->data);

        // Cari ID dari Analisa Posbrix berdasarkan SPTA dari API PDE
        $id = self::getId($resource);

        // Cek state
        $state = self::checkState($count_card, $id);

        // Jika benar
        if($state === TRUE){

            // Ambil data kartu secara FIFO
            $card = self::getCardFifo();

            // Simpan record
            self::save($id, $card, $request);

            // Bersihkan kartu yang telah digunakan
            self::clear($card);

            // Update Analisa Posbrix berdasarkan API dari PDE
            self::updatePosbrix($id, $resource);

            // Selesai
            return redirect()->back()->with("success", "Core Sampling berhasil disimpan.");
        }
        // Jika salah
        else
        {
            // Error
            return redirect()->back()->with("success", "Error : Gagal simpan!");
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
            return FALSE;
        }
        if($id == NULL){
            return FALSE;
        }
        return TRUE;
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
            "barcode_antrian" => $resource["barcode_antrian"],
            "register" => $resource["register"],
            "nopol" => $resource["nopol"],
            "petani" => $resource["nama_petani"],
            "kud_id" => $resource["kud_id"],
            "pospantau_id" => $resource["pospantau_id"],
            "wilayah_id" => $resource["wilayah_id"],
        ]);
    }
}
