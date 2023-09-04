<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use App\Models\Faktor;

class FaktorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $faktor = Faktor::get()->last();
        return view("faktor.index", compact("config", "faktor"));

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
        Faktor::whereId($request->id)->update($request->except([
            "_token", "_method",
        ]));
        return redirect()->back()->with("success", "Faktor berhasil diupdate");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faktor  $rendemenNppAcuan
     * @return \Illuminate\Http\Response
     */
    public function show(Faktor $rendemenNppAcuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faktor  $rendemenNppAcuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Faktor $rendemenNppAcuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faktor  $rendemenNppAcuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faktor $rendemenNppAcuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faktor  $rendemenNppAcuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faktor $rendemenNppAcuan)
    {
        //
    }
}
