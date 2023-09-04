<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Keliling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ImbibisiController extends Controller
{
    public function index(){
        $config = Config::run();
        $imbibisi = Keliling::where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->select(["id", "created_at", "tebu", "flow_imb", "imb_persen_tebu", "tebu", "totalizer_imb"])
            ->orderBy("id", "desc")->get();
        return view("imbibisi.index", compact("config", "imbibisi"));
    }

    public function create()
    {
        $config = Config::run();
        return view("imbibisi.create", compact("config"));
    }

    public function edit($id)
    {
        $config = Config::run();
        $imbibisi = Keliling::whereId($id)
            ->select(["id", "created_at", "flow_imb", "imb_persen_tebu", "tebu", "totalizer_imb"])
            ->get()
            ->last();
        return view("imbibisi.edit", compact("config", "imbibisi"));
    }

    public function update(Request $request, $id)
    {
        $flow = self::hitungImbibisi($request);
        $request->request->add([
            "flow_imb" => $flow["imbibisi"],
            "imb_persen_tebu" => $flow["imb_persen_tebu"],
        ]);
        Keliling::whereId($id)->update($request->except(["_token", "tebu"]));
        return redirect()->route("imbibisi")->with("success", "Imbibisi berhasil dirubah.");
    }

    public function store(Request $request)
    {
        $is_exist = Keliling::where("created_at", $request->created_at)->count();
        if($is_exist > 0){
            $flow = self::hitungImbibisi($request);
            $request->request->add([
                "flow_imb" => $flow["imbibisi"],
                "imb_persen_tebu" => $flow["imb_persen_tebu"],
            ]);
            $collection = collect($request->all());
            $newCollection = $collection->filter();
            $data = $newCollection->toArray();
            unset($data["_token"]);
            Keliling::where("created_at", $data["created_at"])->update($data);
        }
        elseif($is_exist == 0) {
            $flow = self::hitungImbibisi($request);
            $request->request->add([
                "flow_imb" => $flow["imbibisi"],
                "imb_persen_tebu" => $flow["imb_persen_tebu"],
            ]);
            Keliling::create($request->all());
        }
        return redirect()->route("imbibisi")->with("success", "Imbibisi berhasil disimpan.");
    }

    public static function hitungImbibisi($request){
        $count = Keliling::where("totalizer_imb", "!=", NULL)->count();
        if($count != 0)
        {
            $totalizer_latest = Keliling::where("created_at", "<", $request->created_at)->get()->last()->totalizer_imb;
            $imbibisi = $request->totalizer_imb - $totalizer_latest;
            $imb_persen_tebu = ($imbibisi / $request->tebu) * 1000;
        }
        else
        {
            $imbibisi = NULL;
            $imb_persen_tebu = NULL;
        }
        return $data = [
            'imbibisi' => $imbibisi,
            'imb_persen_tebu' => $imb_persen_tebu,
        ];
    }
}
