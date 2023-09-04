<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\RafaksiValue;
use Illuminate\Http\Request;

class RafaksiValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $rafaksi_value = RafaksiValue::get()->last();
        return view("rafaksi_value.index", compact("config", "rafaksi_value"));
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
        RafaksiValue::whereId($request->id)->update($request->except([
            "_token", "_method",
        ]));
        return redirect()->back()->with("success", "Nilai Rafaksi berhasil diupdate");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RafaksiValue  $rafaksiValue
     * @return \Illuminate\Http\Response
     */
    public function show(RafaksiValue $rafaksiValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RafaksiValue  $rafaksiValue
     * @return \Illuminate\Http\Response
     */
    public function edit(RafaksiValue $rafaksiValue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RafaksiValue  $rafaksiValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RafaksiValue $rafaksiValue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RafaksiValue  $rafaksiValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(RafaksiValue $rafaksiValue)
    {
        //
    }
}
