<?php

namespace App\Http\Controllers;

use App\Models\Kawalan;
use App\Models\Config;
use Illuminate\Http\Request;

class KawalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $kawalan = Kawalan::select(["id", "name"])->limit(1000)->orderBy("id", "desc")->get();
        return view("kawalan.index", compact("config", "kawalan"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("kawalan.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kawalan::create($request->all());
        return redirect()->route("kawalan.index")->with("success", "Kawalan berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kawalan  $kawalan
     * @return \Illuminate\Http\Response
     */
    public function show(Kawalan $kawalan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kawalan  $kawalan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $kawalan = Kawalan::whereId($id)->select(["id", "name"])->get()->last();
        return view("kawalan.edit", compact("config", "kawalan"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kawalan  $kawalan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Kawalan::whereId($id)->update([
            "name" => $request->name,
        ]);
        return redirect()->route("kawalan.index")->with("success", "Kawalan berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kawalan  $kawalan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kawalan::whereId($id)->delete();
        return redirect()->route("kawalan.index")->with("success", "Kawalan berhasil dihapus.");
    }
}
