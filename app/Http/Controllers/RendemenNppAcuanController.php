<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use App\Models\RendemenNppAcuan;

class RendemenNppAcuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $rendemen_npp_acuan = RendemenNppAcuan::get()->last();
        return view("rendemen_npp_acuan.index", compact("config", "rendemen_npp_acuan"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        RendemenNppAcuan::whereId($request->id)->update($request->except([
            "_token", "_method",
        ]));
        return redirect()->back()->with("success", "Rendemen NPP Acuan berhasil diupdate");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RendemenNppAcuan  $rendemenNppAcuan
     * @return \Illuminate\Http\Response
     */
    public function show(RendemenNppAcuan $rendemenNppAcuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RendemenNppAcuan  $rendemenNppAcuan
     * @return \Illuminate\Http\Response
     */
    public function edit(RendemenNppAcuan $rendemenNppAcuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RendemenNppAcuan  $rendemenNppAcuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RendemenNppAcuan $rendemenNppAcuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RendemenNppAcuan  $rendemenNppAcuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(RendemenNppAcuan $rendemenNppAcuan)
    {
        //
    }
}
