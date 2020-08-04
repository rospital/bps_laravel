<?php

namespace App;

use App\Obra;
use App\Colaborador;
use Illuminate\Database\Eloquent\Model;

class Construccion extends Model
{
    const TIPO_MOB = "mob";
    const TIPO_AUTOCONSTRUCCION = "autoconstruccion";

    protected $table = 'construcciones';

    protected $fillable = [
        "fecha_desde",
        "fecha_hasta",
        "tipo",
        "obra_id"
    ];

    public function esMob () {
        return $this->tipo == Construccion::TIPO_MOB;
    }

    public function esAutoconstruccion () {
        return $this->tipo == Construccion::TIPO_AUTOCONSTRUCCION;
    }

    public function obra () {
        return $this->belongsTo(Obra::class);
    }

    public function colaboradores () {
        return $this->belongsToMany(Colaborador::class);
    }
}
