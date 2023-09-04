<?php

namespace App\Http\Controllers;

use App\Models\Core;
use App\Models\Config;
use App\Models\SampleCore;
use Illuminate\Http\Request;

class KartuCoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $kartu = SampleCore::get();
        $core = Core::select(["id", "name"])->get();
        return view("kartu_core.index", compact("config", "kartu", "core"));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SampleCore  $sampleCore
     * @return \Illuminate\Http\Response
     */
    public function show(SampleCore $sampleCore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SampleCore  $sampleCore
     * @return \Illuminate\Http\Response
     */
    public function edit(SampleCore $sampleCore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SampleCore  $sampleCore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SampleCore $sampleCore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SampleCore  $sampleCore
     * @return \Illuminate\Http\Response
     */
    public function destroy(SampleCore $sampleCore)
    {
        //
    }
}
