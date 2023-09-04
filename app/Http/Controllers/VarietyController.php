<?php

namespace App\Http\Controllers;

use App\Models\Variety;
use App\Models\Config;
use Illuminate\Http\Request;

class VarietyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $variety = Variety::select(["id", "name"])->limit(1000)->orderBy("id", "desc")->get();
        return view("variety.index", compact("config", "variety"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("variety.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Variety::create($request->all());
        return redirect()->route("variety.index")->with("success", "Varietas berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Variety  $variety
     * @return \Illuminate\Http\Response
     */
    public function show(Variety $variety)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Variety  $variety
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $variety = Variety::whereId($id)->select(["id", "name"])->get()->last();
        return view("variety.edit", compact("config", "variety"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Variety  $variety
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Variety::whereId($id)->update([
            "name" => $request->name,
        ]);
        return redirect()->route("variety.index")->with("success", "Varietas berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Variety  $variety
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Variety::whereId($id)->delete();
        return redirect()->route("variety.index")->with("success", "Varietas berhasil dihapus.");
    }
}
