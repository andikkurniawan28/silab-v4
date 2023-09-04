<?php

namespace App\Http\Controllers;

use App\Models\Timbang;
use App\Models\Config;
use Illuminate\Http\Request;

class TimbangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $timbang = Timbang::select(["id", "name"])->limit(1000)->orderBy("id", "desc")->get();
        return view("timbang.index", compact("config", "timbang"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("timbang.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Timbang::create($request->all());
        return redirect()->route("timbang.index")->with("success", "Titik Timbang berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Timbang  $timbang
     * @return \Illuminate\Http\Response
     */
    public function show(Timbang $timbang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Timbang  $timbang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $timbang = Timbang::whereId($id)->select(["id", "name"])->get()->last();
        return view("timbang.edit", compact("config", "timbang"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Timbang  $timbang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Timbang::whereId($id)->update([
            "name" => $request->name,
        ]);
        return redirect()->route("timbang.index")->with("success", "Titik Timbang berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Timbang  $timbang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Timbang::whereId($id)->delete();
        return redirect()->route("timbang.index")->with("success", "Titik Timbang berhasil dihapus.");
    }
}
