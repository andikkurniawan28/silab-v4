<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Chemical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChemicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $chemical = Chemical::where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("chemical.index", compact("config", "chemical"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("chemical.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Chemical::create($request->all());
        return redirect()->route("chemical.index")->with("success", "Penggunaan Bahan Kimia berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chemical  $chemical
     * @return \Illuminate\Http\Response
     */
    public function show(Chemical $chemical)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chemical  $chemical
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $chemical = Chemical::whereId($id)->get()->last();
        return view("chemical.edit", compact("config", "chemical"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chemical  $chemical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Chemical::whereId($id)->update($request->except([
            "_token", "_method",
        ]));
        return redirect()->route("chemical.index")->with("success", "Penggunaan Bahan Kimia berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chemical  $chemical
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chemical::whereId($id)->delete();
        return redirect()->route("chemical.index")->with("success", "Penggunaan Bahan Kimia berhasil dihapus.");
    }
}
