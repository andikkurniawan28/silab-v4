<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Method;
use App\Models\Station;
use App\Models\Sample;
use App\Models\Material;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function perStation($station_id){
        $config = Config::run();
        $data = Sample::serveDataPerStation($station_id);
        $title = Station::whereId($station_id)->get()->last()->name;
        return view("monitoring.index", compact("config", "data", "title"));
    }

    public function perMaterial($material_id){
        $config = Config::run();
        $data = Sample::serveDataPerMaterial($material_id);
        $title = Material::whereId($material_id)->get()->last()->name;
        $station_id = Material::whereId($material_id)->get()->last()->station_id;
        $station_name = Station::whereId($station_id)->get()->last()->name;
        $method_id = Material::where("id", $material_id)->get()->last()->method_id;
        $method_value = Method::where("id", $method_id)->get()->last()->value;
        return view("monitoring.perMaterial", compact("config", "data", "title", "station_id", "station_name", "method_value", "method_id"));
    }
}
