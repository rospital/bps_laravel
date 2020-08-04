<?php

namespace App;

use App\Empresa;
use App\Persona;
use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    protected $fillable = [
        "numero"
    ];

    public function empresas(){
        return $this->belogsToMany(Empresa::class);
    }

    public function personas(){
        return $this->belogsToMany(Persona::class);
    }
}
