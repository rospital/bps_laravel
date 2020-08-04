<?php

namespace App;

use App\Empresa;
use App\Persona;
use Illuminate\Database\Eloquent\Model;

class Historia extends Model
{
    protected $fillable = [
        "fecha",
        "resumen",
        "empresa_id"
    ];

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

    public function personas(){
        return $this->belongsToMany(Persona::class);
    }
}
