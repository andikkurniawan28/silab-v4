<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Requests\MaterialStoreRequest;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $material = Material::select(["id", "name", "station_id", "method_id"])->limit(1000)->orderBy("id", "desc")->get();
        return view("material.index", compact("config", "material"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("material.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaterialStoreRequest $request)
    {
        Material::create($request->all());
        return redirect()->route("material.index")->with("success", "Material berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $material = Material::whereId($id)->select(["id", "name", "station_id", "method_id"])->get()->last();
        return view("material.edit", compact("config", "material"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Material::whereId($id)->update([
            "station_id" => $request->station_id,
            "method_id" => $request->method_id,
            "name" => $request->name,
        ]);
        return redirect()->route("material.index")->with("success", "Material berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Material::whereId($id)->delete();
        return redirect()->route("material.index")->with("success", "Material berhasil dihapus.");
    }
}
