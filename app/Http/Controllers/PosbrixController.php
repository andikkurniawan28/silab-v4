<?php

namespace App\Http\Controllers;

use App\Models\Posbrix;
use App\Models\Config;
use Illuminate\Http\Request;

class PosbrixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $posbrix = Posbrix::select(["id", "name"])->limit(1000)->orderBy("id", "desc")->get();
        return view("posbrix.index", compact("config", "posbrix"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("posbrix.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Posbrix::create($request->all());
        return redirect()->route("posbrix.index")->with("success", "Titik Posbrix berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posbrix  $posbrix
     * @return \Illuminate\Http\Response
     */
    public function show(Posbrix $posbrix)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posbrix  $posbrix
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $posbrix = Posbrix::whereId($id)->select(["id", "name"])->get()->last();
        return view("posbrix.edit", compact("config", "posbrix"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posbrix  $posbrix
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Posbrix::whereId($id)->update([
            "name" => $request->name,
        ]);
        return redirect()->route("posbrix.index")->with("success", "Titik Posbrix berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posbrix  $posbrix
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Posbrix::whereId($id)->delete();
        return redirect()->route("posbrix.index")->with("success", "Titik Posbrix berhasil dihapus.");
    }
}
