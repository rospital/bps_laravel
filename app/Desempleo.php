<?php

namespace App;

use App\User;
use App\Empresa;
use App\Persona;
use Illuminate\Database\Eloquent\Model;

class Desempleo extends Model
{
    const TRANSFERENCIA_PEDIDA = "transferencia pedida";
    const SIN_TRANSFERENCIA = "transferencia sin realizar";

    protected $fillable = [
        "fecha_desde",
        "fecha_informe",
        "transferencia",
        "persona_id",
        "user_id",
    ];

    public function transferenciaSolicitada(){
        return $this->transferencia == Desempleo::TRANSFERENCIA_PEDIDA;
    }

    public function persona(){
        return $this->belogsTo(Persona::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function empresas(){
        return $this->belongsToMany(Empresa::class);
    }
}
