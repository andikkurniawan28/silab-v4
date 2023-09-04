<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use App\Models\Config;
use App\Models\Activity;
use App\Models\Material;
use Illuminate\Http\Request;

class CetakRonselController extends Controller
{
    public function index()
    {
        $config = Config::run();
        $materials = Material::where('station_id', 6)->where('name', 'like', 'Masakan %')->get();
        return view('cetak_ronsel.index', compact('config', 'materials'));
    }

    public function store(Request $request)
    {
        Sample::create($request->all());
        $data = Sample::where('material_id', $request->material_id)->get()->last();
        return view('cetak_ronsel.show', compact('data'));
    }

}
