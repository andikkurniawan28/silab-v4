<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Balance;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\BalanceStoreRequest;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $balance = Balance::where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("balance.index", compact("config", "balance"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("balance.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BalanceStoreRequest $request)
    {
        $flow = self::hitungFlow($request->totalizer_nm);
        $nm_persen_tebu = self::hitungFlowPersenTebu($flow, $request->tebu);
        $request->request->add([
            "flow_nm" => $flow,
            "nm_persen_tebu" => $nm_persen_tebu,
        ]);
        Balance::create($request->all());
        return redirect()->route("balance.create")->with("success", "Neraca NM berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function show(Balance $balance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $balance = Balance::whereId($id)->get()->last();
        return view("balance.edit", compact("config", "balance"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Balance::whereId($id)->update([
            "tebu" => $request->tebu,
            "totalizer_nm" => $request->totalizer_nm,
            "sfc" => $request->sfc,
            "flow_nm" => $request->flow_nm,
            "nm_persen_tebu" => $request->nm_persen_tebu,
        ]);
        return redirect()->route("balance.index")->with("success", "Neraca NM berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Balance::whereId($id)->delete();
        return redirect()->route("balance.index")->with("success", "Neraca NM berhasil dihapus.");
    }

    public static function hitungFlow($totalizer){
        $totalizer_lama = Balance::get()->last()->totalizer_nm ?? 0;
        return $totalizer - $totalizer_lama;
    }

    public static function hitungFlowPersenTebu($flow, $tebu){
        if($flow == 0 || $tebu == 0){
            return NULL;
        } else {
            return $flow / $tebu * 1000;
        }

    }
}
