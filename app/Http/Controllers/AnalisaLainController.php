<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Material;
use App\Models\AnalisaLain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AnalisaLainStoreRequest;

class AnalisaLainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $analisa_lain = AnalisaLain::where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("analisa_lain.index", compact("config", "analisa_lain"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("analisa_lain.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnalisaLainStoreRequest $request)
    {
        AnalisaLain::create($request->all());
        return redirect()->route("analisa_lain.create")->with("success", "Analisa Lain2 berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnalisaLain  $analisa_lain
     * @return \Illuminate\Http\Response
     */
    public function show(AnalisaLain $analisa_lain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnalisaLain  $analisa_lain
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $analisa_lain = AnalisaLain::whereId($id)->get()->last();
        return view("analisa_lain.edit", compact("config", "analisa_lain"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnalisaLain  $analisa_lain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        AnalisaLain::whereId($id)->update([
            "sample_id" => $request->sample_id,
            "bintik_hitam" => $request->bintik_hitam,
        ]);
        return redirect()->route("analisa_lain.index")->with("success", "Analisa Lain2 berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnalisaLain  $analisa_lain
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AnalisaLain::whereId($id)->delete();
        return redirect()->route("analisa_lain.index")->with("success", "Analisa Lain2 berhasil dihapus.");
    }
}
