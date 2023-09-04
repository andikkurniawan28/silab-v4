<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Material;
use App\Models\AnalisaSulphur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AnalisaSulphurStoreRequest;

class AnalisaSulphurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $analisa_sulphur = AnalisaSulphur::where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("analisa_sulphur.index", compact("config", "analisa_sulphur"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("analisa_sulphur.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnalisaSulphurStoreRequest $request)
    {
        AnalisaSulphur::create($request->all());
        return redirect()->route("analisa_sulphur.create")->with("success", "Analisa SO2/BJB berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnalisaSulphur  $analisa_sulphur
     * @return \Illuminate\Http\Response
     */
    public function show(AnalisaSulphur $analisa_sulphur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnalisaSulphur  $analisa_sulphur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $analisa_sulphur = AnalisaSulphur::whereId($id)->get()->last();
        return view("analisa_sulphur.edit", compact("config", "analisa_sulphur"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnalisaSulphur  $analisa_sulphur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        AnalisaSulphur::whereId($id)->update([
            "sample_id" => $request->sample_id,
            "so2" => $request->so2,
            "bjb" => $request->bjb,
        ]);
        return redirect()->route("analisa_sulphur.index")->with("success", "Analisa SO2/BJB berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnalisaSulphur  $analisa_sulphur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AnalisaSulphur::whereId($id)->delete();
        return redirect()->route("analisa_sulphur.index")->with("success", "Analisa SO2/BJB berhasil dihapus.");
    }
}
