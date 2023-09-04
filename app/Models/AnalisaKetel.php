<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalisaKetel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sample(){
        return $this->belongsTo(Sample::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
