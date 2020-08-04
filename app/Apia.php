<?php

namespace App;

use App\Dt;
use Illuminate\Database\Eloquent\Model;

class Apia extends Model
{
    protected $fillable = [
        "anio",
        "numero"
    ];

    public function dts(){
        $this->belongsToMany(Dt::class);
    }
}
