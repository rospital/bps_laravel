<?php

namespace App;

use App\Empresa;
use App\Persona;
use Illuminate\Database\Eloquent\Model;

class Dnp extends Model
{
    protected $fillable = [
        "mes_desde",
        "anio_desde",
        "mes_hasta",
        "anio_hasta",
        "empresa_id",
        "persona_id"
    ];
    
    public function empresa(){
        return $this->belogsTo(Empresa::class);
    }

    public function persona(){
        return $this->belogsTo(Persona::class);
    }

    
}
