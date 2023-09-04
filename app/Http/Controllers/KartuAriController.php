<?php

namespace App\Http\Controllers;

use App\Models\Ari;
use App\Models\Config;
use App\Models\SampleAri;
use Illuminate\Http\Request;

class KartuAriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $kartu = SampleAri::get();
        return view("kartu_ari.index", compact("config", "kartu"));
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
     * @param  \App\Models\SampleAri  $sampleAri
     * @return \Illuminate\Http\Response
     */
    public function show(SampleAri $sampleAri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SampleAri  $sampleAri
     * @return \Illuminate\Http\Response
     */
    public function edit(SampleAri $sampleAri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SampleAri  $sampleAri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SampleAri $sampleAri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SampleAri  $sampleAri
     * @return \Illuminate\Http\Response
     */
    public function destroy(SampleAri $sampleAri)
    {
        //
    }
}
