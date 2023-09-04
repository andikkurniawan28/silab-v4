<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalisaPosbrix extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function posbrix(){
        return $this->belongsTo(Posbrix::class);
    }

    public function kawalan(){
        return $this->belongsTo(Kawalan::class);
    }

    public function variety(){
        return $this->belongsTo(Variety::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function core_sampling(){
        return $this->hasOne(CoreSampling::class);
    }

    public function analisa_core(){
        return $this->hasOne(AnalisaCore::class);
    }

    public function ari_sampling(){
        return $this->hasOne(AriSampling::class);
    }

    public function analisa_ari(){
        return $this->hasOne(AnalisaAri::class);
    }

    public function scoring(){
        return $this->hasOne(Scoring::class);
    }

    public function kud(){
        return $this->belongsTo(Kud::class);
    }

    public function pospantau(){
        return $this->belongsTo(Pospantau::class);
    }

    public function wilayah(){
        return $this->belongsTo(Wilayah::class);
    }
}
