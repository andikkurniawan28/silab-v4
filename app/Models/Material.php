<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function station(){
        return $this->belongsTo(Station::class);
    }

    public function method(){
        return $this->belongsTo(Method::class);
    }

    public function sample(){
        return $this->hasMany(Sample::class);
    }
}
