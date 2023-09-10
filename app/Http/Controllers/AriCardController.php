<?php

namespace App\Http\Controllers;

use App\Models\Timbang;
use App\Models\Config;
use App\Models\AriCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AriCardStoreRequest;

class AriCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $ari_card = AriCard::get();
        return view("ari_card.index", compact("config", "ari_card"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $timbang = Timbang::all();
        $config = Config::run();
        return view("ari_card.create", compact("config", "timbang"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AriCardStoreRequest $request)
    {
        AriCard::create($request->all());
        return redirect()->route("ari_card.create")->with("success", "Kartu ARI berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AriCard  $ari_card
     * @return \Illuminate\Http\Response
     */
    public function show(AriCard $ari_card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AriCard  $ari_card
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $timbang = Timbang::all();
        $ari_card = AriCard::whereId($id)->get()->last();
        return view("ari_card.edit", compact("config", "ari_card", "timbang"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AriCard  $ari_card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        AriCard::whereId($id)->update([
            "rfid" => $request->rfid,
            "timbang_id" => $request->timbang_id,
        ]);
        return redirect()->route("ari_card.index")->with("success", "Kartu ARI berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AriCard  $ari_card
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AriCard::whereId($id)->delete();
        return redirect()->route("ari_card.index")->with("success", "Kartu ARI berhasil dihapus.");
    }
}
