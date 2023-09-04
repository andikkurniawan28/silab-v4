<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreSampling extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function core(){
        return $this->belongsTo(Core::class);
    }

    public function analisa_posbrix(){
        return $this->belongsTo(AnalisaPosbrix::class);
    }

    public function analisa_core(){
        return $this->hasOne(AnalisaCore::class);
    }
}
