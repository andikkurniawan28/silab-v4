<?php

namespace App\Http\Controllers;

use App\Models\Kud;
use App\Models\Config;
use Illuminate\Http\Request;

class KudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $kud = Kud::select(["id", "name", "code"])->limit(1000)->orderBy("id", "desc")->get();
        return view("kud.index", compact("config", "kud"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("kud.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kud::create($request->all());
        return redirect()->route("kud.index")->with("success", "KUD berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kud  $kud
     * @return \Illuminate\Http\Response
     */
    public function show(Kud $kud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kud  $kud
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $kud = Kud::whereId($id)->select(["id", "name", "code"])->get()->last();
        return view("kud.edit", compact("config", "kud"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kud  $kud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Kud::whereId($id)->update([
            "code" => $request->code,
            "name" => $request->name,
        ]);
        return redirect()->route("kud.index")->with("success", "KUD berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kud  $kud
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kud::whereId($id)->delete();
        return redirect()->route("kud.index")->with("success", "KUD berhasil dihapus.");
    }
}
