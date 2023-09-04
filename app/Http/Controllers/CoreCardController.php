<?php

namespace App\Http\Controllers;

use App\Models\Core;
use App\Models\Config;
use App\Models\CoreCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CoreCardStoreRequest;

class CoreCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $core_card = CoreCard::get();
        return view("core_card.index", compact("config", "core_card"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $core = Core::all();
        $config = Config::run();
        return view("core_card.create", compact("config", "core"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoreCardStoreRequest $request)
    {
        CoreCard::create($request->all());
        return redirect()->route("core_card.create")->with("success", "Kartu Core berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoreCard  $core_card
     * @return \Illuminate\Http\Response
     */
    public function show(CoreCard $core_card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoreCard  $core_card
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $core = Core::all();
        $core_card = CoreCard::whereId($id)->get()->last();
        return view("core_card.edit", compact("config", "core_card", "core"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CoreCard  $core_card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        CoreCard::whereId($id)->update([
            "rfid" => $request->rfid,
            "core_id" => $request->core_id,
        ]);
        return redirect()->route("core_card.index")->with("success", "Kartu Core berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoreCard  $core_card
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CoreCard::whereId($id)->delete();
        return redirect()->route("core_card.index")->with("success", "Kartu Core berhasil dihapus.");
    }
}
