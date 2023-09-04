<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Material;
use App\Models\Saccharomat;
use App\Models\AnalisaBlotong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AnalisaBlotongStoreRequest;

class AnalisaBlotongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $analisa_blotong = AnalisaBlotong::where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("analisa_blotong.index", compact("config", "analisa_blotong"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("analisa_blotong.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnalisaBlotongStoreRequest $request)
    {
        $kadar_air = self::hitungKadarAir($request->zat_kering);
        $request->request->add([
            "kadar_air" => $kadar_air,
        ]);
        AnalisaBlotong::create($request->all());
        return redirect()->route("analisa_blotong.create")->with("success", "Analisa Blotong berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnalisaBlotong  $analisa_blotong
     * @return \Illuminate\Http\Response
     */
    public function show(AnalisaBlotong $analisa_blotong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnalisaBlotong  $analisa_blotong
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $analisa_blotong = AnalisaBlotong::whereId($id)->get()->last();
        return view("analisa_blotong.edit", compact("config", "analisa_blotong"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnalisaBlotong  $analisa_blotong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kadar_air = self::hitungKadarAir($request->zat_kering);
        AnalisaBlotong::whereId($id)->update([
            "sample_id" => $request->sample_id,
            "zat_kering" => $request->zat_kering,
            "kadar_air" => $kadar_air,
        ]);
        return redirect()->route("analisa_blotong.index")->with("success", "Analisa Blotong berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnalisaBlotong  $analisa_blotong
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AnalisaBlotong::whereId($id)->delete();
        return redirect()->route("analisa_blotong.index")->with("success", "Analisa Blotong berhasil dihapus.");
    }

    public static function hitungKadarAir($zat_kering){
        return 100 - $zat_kering;
    }
}
