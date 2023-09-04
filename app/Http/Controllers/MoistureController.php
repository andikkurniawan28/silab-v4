<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Material;
use App\Models\Moisture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\MoistureStoreRequest;

class MoistureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $moisture = Moisture::where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("moisture.index", compact("config", "moisture"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("moisture.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MoistureStoreRequest $request)
    {
        Moisture::create($request->all());
        return redirect()->route("moisture.create")->with("success", "Moisture berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Moisture  $moisture
     * @return \Illuminate\Http\Response
     */
    public function show(Moisture $moisture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Moisture  $moisture
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $moisture = Moisture::whereId($id)->get()->last();
        return view("moisture.edit", compact("config", "moisture"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Moisture  $moisture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Moisture::whereId($id)->update([
            "sample_id" => $request->sample_id,
            "moisture" => $request->moisture,
        ]);
        return redirect()->route("moisture.index")->with("success", "Moisture berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Moisture  $moisture
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Moisture::whereId($id)->delete();
        return redirect()->route("moisture.index")->with("success", "Moisture berhasil dihapus.");
    }
}
