<?php

namespace App;

use App\Empresa;
use App\Persona;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $fillable = [
        "calle",
        "numero",
        "complemento",
        "departamento",
        "localidad"
    ];

    protected $table = 'direcciones';

    public function empresas(){
        return $this->belongsToMany(Empresa::class);
    }

    public function personas(){
        return $this->belongsToMany(Persona::class);
    }
}
