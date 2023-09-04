<?php

namespace App\Http\Controllers;

use App\Models\Core;
use App\Models\Config;
use Illuminate\Http\Request;

class CoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $core = Core::select(["id", "name"])->limit(1000)->orderBy("id", "desc")->get();
        return view("core.index", compact("config", "core"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("core.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Core::create($request->all());
        return redirect()->route("core.index")->with("success", "Titik Core berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Core  $core
     * @return \Illuminate\Http\Response
     */
    public function show(Core $core)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Core  $core
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $core = Core::whereId($id)->select(["id", "name"])->get()->last();
        return view("core.edit", compact("config", "core"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Core  $core
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Core::whereId($id)->update([
            "name" => $request->name,
        ]);
        return redirect()->route("core.index")->with("success", "Titik Core berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Core  $core
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Core::whereId($id)->delete();
        return redirect()->route("core.index")->with("success", "Titik Core berhasil dihapus.");
    }
}
