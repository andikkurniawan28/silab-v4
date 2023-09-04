<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Balance;
use App\Models\Material;
use App\Models\Imbibition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ImbibitionStoreRequest;

class ImbibitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $imbibition = Imbibition::where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("imbibition.index", compact("config", "imbibition"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("imbibition.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImbibitionStoreRequest $request)
    {
        $flow = self::hitungFlow($request->totalizer_imb);
        $imb_persen_tebu = self::hitungFlowPersenTebu($flow, $request->created_at);
        $request->request->add([
            "flow_imb" => $flow,
            "imb_persen_tebu" => $imb_persen_tebu,
        ]);
        Imbibition::create($request->all());
        return redirect()->route("imbibition.create")->with("success", "Imbibisi berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imbibition  $imbibition
     * @return \Illuminate\Http\Response
     */
    public function show(Imbibition $imbibition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Imbibition  $imbibition
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $imbibition = Imbibition::whereId($id)->get()->last();
        return view("imbibition.edit", compact("config", "imbibition"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imbibition  $imbibition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Imbibition::whereId($id)->update([
            "totalizer_imb" => $request->totalizer_imb,
            "flow_imb" => $request->flow_imb,
            "imb_persen_tebu" => $request->imb_persen_tebu,
        ]);
        return redirect()->route("imbibition.index")->with("success", "Imbibisi berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imbibition  $imbibition
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Imbibition::whereId($id)->delete();
        return redirect()->route("imbibition.index")->with("success", "Imbibisi berhasil dihapus.");
    }

    public static function hitungFlow($totalizer){
        $totalizer_lama = Imbibition::get()->last()->totalizer_imb ?? 0;
        return $totalizer - $totalizer_lama;
    }

    public static function hitungFlowPersenTebu($flow, $created_at){
        $tebu = Balance::where("created_at", $created_at)->get()->last()->tebu ?? 0;
        if($flow == 0 || $tebu == 0){
            return NULL;
        } else {
            return $flow / $tebu * 1000;
        }

    }
}
