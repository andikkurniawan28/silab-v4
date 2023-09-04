<?php

namespace App\Http\Controllers;

use App\Models\Core;
use App\Models\Config;
use App\Models\Onfarm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AnalisaCoreSampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $analisa_core_sample = Onfarm::select(["id", "spta", "core_id", "core_at", "rfid_core_sample", "barcode_antrian", "brix_core_sample", "pol_core_sample", "rendemen_core_sample"])
            ->where("core_at", ">=", Session::get("time_start"))
            ->where("core_at", "<", Session::get("time_end"))
            ->limit(1000)
            ->orderBy("id", "desc")->get();
        $core = Core::get();
        return view("analisa_core_sample.index", compact("config", "analisa_core_sample", "core"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        $core = Core::select(["id", "name"])->orderBy("id", "asc")->get();
        return view("analisa_core_sample.create", compact("config", "core"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Onfarm::where("rfid_core_sample", $request->rfid_core_sample)->count() == 0){
            return redirect()->back()->with("success", "Error : Kartu dengan kode {$request->rfid_core_sample} tidak terdaftar!");
        } else {
            $id = Onfarm::where("rfid_core_sample", $request->rfid_core_sample)->get()->first()->id;
            $rendemen = self::hitungRendemen($request->brix_core_sample, $request->pol_core_sample);
            $request->request->add(["rendemen_core_sample" => $rendemen]);
            Onfarm::whereId($id)->update($request->except([
                "_token", "_method",
            ]));
            return redirect()->back()->with("success", "Analisa Core Sample berhasil disimpan");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $analisa_core_sample = Onfarm::whereId($id)->get()->last();
        return view("analisa_core_sample.edit", compact("config", "analisa_core_sample"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rendemen = self::hitungRendemen($request->brix_core_sample, $request->pol_core_sample);
        $request->request->add(["rendemen_core_sample" => $rendemen]);
        Onfarm::whereId($id)->update($request->except(
            ["_token", "_method"]
        ));
        return redirect()->route("analisa_core_sample.index")->with("success", "Analisa Core Sample berhasil dirubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Onfarm::whereId($id)->update([
            "core_id" => NULL,
            "brix_core_sample" => NULL,
            "pol_core_sample" => NULL,
            "rendemen_core_sample" => NULL,
        ]);
        return redirect()->back()->with("success", "Analisa Core Sample berhasil dihapus");
    }

    public static function hitungRendemen($pbrix, $ppol){
        if($pbrix != null || $ppol != null){
            return ($ppol- ( 0.5 * ($pbrix - $ppol) ) * 0.7);
        } else {
            return null;
        }
    }
}
