<?php

namespace App;

use App\Localidad;
use App\Construccion;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    protected $fillable = [
        "numero",
        "padron",
        "localidad_id"
    ];

    public function construcciones () {
        return $this->hasMany(Construccion::class);
    }

    public function localidad () {
        return $this->belongsTo(Localidad::class);
    }
}
