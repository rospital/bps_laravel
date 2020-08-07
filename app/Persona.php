<?php

namespace App;

use App\Dt;
use App\Dnp;
use App\Email;
use App\Empresa;
use App\Persona;
use App\Historia;
use App\Telefono;
use App\Desempleo;
use App\Direccion;
use App\Construccion;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    const DOC_CI = "cedula de identidad";
    const DOC_OTRO = "otro documento";

    const PERSONA_GESTOR = "gestor";
    const PERSONA_COMUN = "comun";

    protected $fillable = [
        "documento",
        "documento_tipo",
        "primer_nombre",
        "segundo_nombre",
        "primer_apellido",
        "segundo_apellido",
        "foto",
        "gestor"
    ];

    public function esCI () {
        return $this->documento_tipo == Persona::DOC_CI;
    }

    public function esGestor(){
        return $this->gestor == Persona::PERSONA_GESTOR;
    }

    public function direcciones(){
        return $this->belogsToMany(Direccion::class);
    }

    public function telefonos(){
        return $this->belogsToMany(Telefono::class);
    }

    public function emails(){
        return $this->belogsToMany(Email::class);
    }

    public function dts(){
        return $this->hasMany(Dt::class);
    }

    public function dnps(){
        return $this->hasMany(Dnp::class);
    }

    public function desempleos(){
        return $this->hasMany(Desempleo::class);
    }

    public function historias(){
        return $this->belongsToMany(Historia::class);
    }

    public function empresas(){
        return $this->belongsToMany(Empresa::class);
    }

    public function construcciones () {
        return $this->belongsToMany(Construccion::class);
    }
    
}
