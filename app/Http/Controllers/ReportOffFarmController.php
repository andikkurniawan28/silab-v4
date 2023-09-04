<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use App\Models\ReportOffFarm;

class ReportOffFarmController extends Controller
{
    public function index(){
        $config = Config::run();
        $data = ReportOffFarm::prepare();
        $timbangan = ReportOffFarm::timbangan();
        return view("report_off_farm.index", compact("config", "data", "timbangan"));
    }
}
