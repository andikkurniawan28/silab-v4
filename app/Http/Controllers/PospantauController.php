<?php

namespace App\Http\Controllers;

use App\Models\Pospantau;
use App\Models\Config;
use Illuminate\Http\Request;

class PospantauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $pospantau = Pospantau::select(["id", "name", "code"])->limit(1000)->orderBy("id", "desc")->get();
        return view("pospantau.index", compact("config", "pospantau"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("pospantau.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pospantau::create($request->all());
        return redirect()->route("pospantau.index")->with("success", "Pos Pantau berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pospantau  $pospantau
     * @return \Illuminate\Http\Response
     */
    public function show(Pospantau $pospantau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pospantau  $pospantau
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $pospantau = Pospantau::whereId($id)->select(["id", "name", "code"])->get()->last();
        return view("pospantau.edit", compact("config", "pospantau"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pospantau  $pospantau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Pospantau::whereId($id)->update([
            "code" => $request->code,
            "name" => $request->name,
        ]);
        return redirect()->route("pospantau.index")->with("success", "Pos Pantau berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pospantau  $pospantau
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pospantau::whereId($id)->delete();
        return redirect()->route("pospantau.index")->with("success", "Pos Pantau berhasil dihapus.");
    }
}
