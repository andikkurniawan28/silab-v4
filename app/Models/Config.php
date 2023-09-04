<?php

namespace App\Models;

use App\Models\Method;
use App\Models\Station;
use App\Models\Material;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Config extends Model
{
    use HasFactory;

    public static function run(){
        $data["station"] = Station::select(["id", "name"])->orderBy("id", "asc")->get();
        $data["method"] = Method::select(["id", "name"])->orderBy("id", "asc")->get();
        $data["material"] = Material::select(["id", "name"])->orderBy("id", "asc")->get();
        return $data;
    }
}
