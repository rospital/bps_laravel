<?php

namespace App;

use App\Dt;
use App\Dnp;
use App\Email;
use App\Persona;
use App\Telefono;
use App\Desempleo;
use App\Direccion;
use App\Semiomisa;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        "registro",
        "razon",
    ];

    public function direcciones(){
        return $this->belongsToMany(Direccion::class);
    }

    public function telefonos(){
        return $this->belongsToMany(Telefono::class);
    }

    public function emails(){
        return $this->belongsToMany(Email::class);
    }

    public function dts(){
        return $this->hasMany(Dt::class);
    }

    public function historias(){
        return $this->hasMany(Historia::class);
    }

    public function semiomisas(){
        return $this->hasMany(Semiomisa::class);
    }

    public function dnps(){
        return $this->hasMany(Dnp::class);
    }

    public function personas(){
        return $this->belongsToMany(Persona::class);
    }

    public function desempleos(){
        return $this->belongsToMany(Desempleo::class);
    }
}
