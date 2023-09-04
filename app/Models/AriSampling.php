<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AriSampling extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function timbang(){
        return $this->belongsTo(Timbang::class);
    }

    public function analisa_posbrix(){
        return $this->belongsTo(AnalisaPosbrix::class);
    }

    public function analisa_core(){
        return $this->hasOne(AnalisaCore::class);
    }
}
