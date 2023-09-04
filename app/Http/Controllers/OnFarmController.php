<?php

namespace App\Http\Controllers;

use App\Models\Core;
use App\Models\Config;
use App\Models\Status;
use App\Models\Kawalan;
use App\Models\Posbrix;
use App\Models\Timbang;
use App\Models\Variety;
use Illuminate\Http\Request;

class OnFarmController extends Controller
{
    public function analisaPosbrix($posbrix_id){
        $config = Config::run();
        $posbrix = Posbrix::whereId($posbrix_id)->get()->last();
        $kawalan = Kawalan::all();
        $variety = Variety::all();
        $status = Status::all();
        return view("on_farm.analisa_posbrix", compact("config", "posbrix", "kawalan", "variety", "status"));
    }

    public function coreSampling($core_id){
        $config = Config::run();
        $core = Core::whereId($core_id)->get()->last();
        return view("on_farm.core_sampling", compact("config", "core"));
    }

    public function ariSampling($timbang_id){
        $config = Config::run();
        $timbang = Timbang::whereId($timbang_id)->get()->last();
        return view("on_farm.ari_sampling", compact("config", "timbang"));
    }
}
