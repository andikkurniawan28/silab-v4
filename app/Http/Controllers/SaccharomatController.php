<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Faktor;
use App\Models\Sample;
use App\Models\Material;
use App\Models\Saccharomat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\SaccharomatStoreRequest;

class SaccharomatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $saccharomat = Saccharomat::where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("saccharomat.index", compact("config", "saccharomat"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("saccharomat.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaccharomatStoreRequest $request)
    {
        $request->request->add([
            "hk" => self::hitungHK($request->pbrix, $request->ppol),
            "rendemen" => self::hitungRendemen($request->pbrix, $request->ppol, $request->sample_id),
        ]);
        Saccharomat::create($request->all());
        return redirect()->route("saccharomat.create")->with("success", "Saccharomat berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Saccharomat  $saccharomat
     * @return \Illuminate\Http\Response
     */
    public function show(Saccharomat $saccharomat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Saccharomat  $saccharomat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $saccharomat = Saccharomat::whereId($id)->get()->last();
        return view("saccharomat.edit", compact("config", "saccharomat"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Saccharomat  $saccharomat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hk = self::hitungHK($request->pbrix, $request->ppol);
        $rendemen = self::hitungHK($request->pbrix, $request->ppol, $request->sample_id);
        Saccharomat::whereId($id)->update([
            "sample_id" => $request->sample_id,
            "pbrix" => $request->pbrix,
            "ppol" => $request->ppol,
            "pol" => $request->pol,
            "hk" => $request->hk,
            "rendemen" => $request->rendemen,
        ]);
        return redirect()->route("saccharomat.index")->with("success", "Saccharomat berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Saccharomat  $saccharomat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Saccharomat::whereId($id)->delete();
        return redirect()->route("saccharomat.index")->with("success", "Saccharomat berhasil dihapus.");
    }

    public static function hitungHK($pbrix, $ppol){
        if($pbrix != NULL || $ppol != NULL){
            return $ppol / $pbrix * 100;
        } else {
            return NULL;
        }
    }

    public static function hitungRendemen($pbrix, $ppol, $sample_id){
        $material_id = Sample::whereId($sample_id)->get()->last()->material_id;
        if($material_id == 3){

            $faktor = Faktor::get()->last();
            $faktor_mellase = $faktor->faktor_mellase_npp;
            $faktor_rendemen = $faktor->faktor_mellase_npp;
            $koreksi = $faktor_mellase * ($pbrix - $ppol);
            $rendemen = ($ppol - $koreksi) * $faktor_rendemen;
            return $rendemen;

        } else {
            return NULL;
        }
    }
}
