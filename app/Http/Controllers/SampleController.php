<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Sample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\SampleStoreRequest;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $sample = Sample::where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("sample.index", compact("config", "sample"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("sample.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SampleStoreRequest $request)
    {
        Sample::create($request->all());
        return redirect()->route("sample.index")->with("success", "Sampel berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function show(Sample $sample)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $sample = Sample::whereId($id)->select(["id", "material_id"])->get()->last();
        return view("sample.edit", compact("config", "sample"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Sample::whereId($id)->update([
            "material_id" => $request->material_id,
        ]);
        return redirect()->route("sample.index")->with("success", "Sampel berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sample::whereId($id)->delete();
        return redirect()->route("sample.index")->with("success", "Sampel berhasil dihapus.");
    }
}
