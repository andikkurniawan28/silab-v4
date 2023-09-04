<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use App\Models\Config;
use App\Models\Activity;
use App\Models\Material;
use Illuminate\Http\Request;

class CetakBarcodeByCategoryController extends Controller
{
    public function index($station_id)
    {
        $config = Config::run();
        $materials = Material::where('station_id', $station_id)->get();
        return view('cetak_barcodebycategory.index', compact('config', 'materials'));
    }

    public function store(Request $request)
    {
        $created_at = self::generateHour();
        Sample::insert([
            'material_id' => $request->material_id,
            'user_id' => $request->user_id,
            'created_at' => $created_at,
        ]);
        $data = Sample::where('material_id', $request->material_id)->get()->last();
        return view('cetak_barcode.show', compact('data'));
    }

    public static function generateHour(){
        $minute = date('i');

        if($minute >= 0 && $minute < 10){
            $minute_adjusted = 0;
        }
        elseif($minute >= 10 && $minute < 20){
            $minute_adjusted = 10;
        }
        elseif($minute >= 20 && $minute < 30){
            $minute_adjusted = 20;
        }
        elseif($minute >= 30 && $minute < 40){
            $minute_adjusted = 30;
        }
        elseif($minute >= 40 && $minute < 50){
            $minute_adjusted = 40;
        }
        else if($minute >= 50){
            $minute_adjusted = 50;
        }

       return date('Y-m-d H:').$minute_adjusted;
    }
}
