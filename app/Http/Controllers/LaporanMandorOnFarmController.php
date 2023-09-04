<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanMandorOnFarm;

class LaporanMandorOnFarmController extends Controller
{
    public function index($shift){
        if($shift > 4){
            return redirect()->back()->with("success", "Shift invalid");
        }
        $data = LaporanMandorOnFarm::prepare($shift);
        return view("laporan_mandor_on_farm.index", compact("data", "shift"));
    }
}
