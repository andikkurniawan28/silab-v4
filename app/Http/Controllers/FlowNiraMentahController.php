<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Keliling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FlowNiraMentahController extends Controller
{
    public function index(){
        $config = Config::run();
        $flow_nm = Keliling::where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->select(["id", "created_at", "tebu", "totalizer_nm", "flow_nm", "sfc", "flow_imb", "nm_persen_tebu", "imb_persen_tebu", "totalizer_imb"])
            ->orderBy("id", "desc")->get();
        return view("flow_nm.index", compact("config", "flow_nm"));
    }

    public function create()
    {
        $config = Config::run();
        return view("flow_nm.create", compact("config"));
    }

    public function edit($id)
    {
        $config = Config::run();
        $flow_nm = Keliling::whereId($id)
            ->select(["id", "created_at", "tebu", "totalizer_nm", "flow_nm", "sfc", "flow_imb", "nm_persen_tebu", "imb_persen_tebu"])
            ->get()
            ->last();
        return view("flow_nm.edit", compact("config", "flow_nm"));
    }

    public function update(Request $request, $id)
    {
        $flow = self::hitungFlowNiraMentah($request);
        $request->request->add([
            "flow_nm" => $flow["flow_nm"],
            "nm_persen_tebu" => $flow["nm_persen_tebu"],
        ]);
        Keliling::whereId($id)->update($request->except(["_token"]));
        return redirect()->route("flow_nm")->with("success", "Flow NM berhasil dirubah.");
    }

    public function store(Request $request)
    {
        $is_exist = Keliling::where("created_at", $request->created_at)->count();
        if($is_exist > 0){
            $flow = self::hitungFlowNiraMentah($request);
            $request->request->add([
                "flow_nm" => $flow["flow_nm"],
                "nm_persen_tebu" => $flow["nm_persen_tebu"],
            ]);
            $collection = collect($request->all());
            $newCollection = $collection->filter();
            $data = $newCollection->toArray();
            unset($data["_token"]);
            Keliling::where("created_at", $data["created_at"])->update($data);
        }
        elseif($is_exist == 0) {
            $flow = self::hitungFlowNiraMentah($request);
            $request->request->add([
                "flow_nm" => $flow["flow_nm"],
                "nm_persen_tebu" => $flow["nm_persen_tebu"],
            ]);
            Keliling::create($request->all());
        }
        return redirect()->route("flow_nm")->with("success", "Flow NM berhasil disimpan.");
    }

    public static function hitungFlowNiraMentah($request){
        $count = Keliling::where("totalizer_nm", "!=", NULL)->count();
        if($count != 0)
        {
            $totalizer_latest = Keliling::where("created_at", "<", $request->created_at)->get()->last()->totalizer_nm;
            $flow_nm = $request->totalizer_nm - $totalizer_latest;
            $nm_persen_tebu = ($flow_nm / $request->tebu) * 1000;
        }
        else
        {
            $flow_nm = NULL;
            $nm_persen_tebu = NULL;
        }
        return $data = [
            'flow_nm' => $flow_nm,
            'nm_persen_tebu' => $nm_persen_tebu,
        ];
    }
}
