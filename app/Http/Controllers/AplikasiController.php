<?php

namespace App\Http\Controllers;

use App\Models\PDE;
use Illuminate\Http\Request;

class AplikasiController extends Controller
{
    public static function getAntrian($barcode_antrian){
        $data = PDE::antrian($barcode_antrian);
        $data["kud_id"] = PDE::findKud($data["register"]);
        $data["pospantau_id"] = PDE::findPospantau($data["register"]);
        $data["wilayah_id"] = PDE::findWilayah($data["register"]);
        return $data;
    }

    public static function getRfid($rfid){
        $data = PDE::rfid($rfid);
        $data["kud_id"] = PDE::findKud($data["register"]);
        $data["pospantau_id"] = PDE::findPospantau($data["register"]);
        $data["wilayah_id"] = PDE::findWilayah($data["register"]);
        return $data;
    }

}
