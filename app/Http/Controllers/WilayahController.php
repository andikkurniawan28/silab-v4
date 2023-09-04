<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use App\Models\Config;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $wilayah = Wilayah::select(["id", "name", "code"])->limit(1000)->orderBy("id", "desc")->get();
        return view("wilayah.index", compact("config", "wilayah"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("wilayah.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Wilayah::create($request->all());
        return redirect()->route("wilayah.index")->with("success", "Wilayah berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function show(Wilayah $wilayah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $wilayah = Wilayah::whereId($id)->select(["id", "name", "code"])->get()->last();
        return view("wilayah.edit", compact("config", "wilayah"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Wilayah::whereId($id)->update([
            "code" => $request->code,
            "name" => $request->name,
        ]);
        return redirect()->route("wilayah.index")->with("success", "Wilayah berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Wilayah::whereId($id)->delete();
        return redirect()->route("wilayah.index")->with("success", "Wilayah berhasil dihapus.");
    }
}
