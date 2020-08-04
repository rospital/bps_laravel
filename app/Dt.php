<?php

namespace App;

use App\Apia;
use App\Empresa;
use Illuminate\Database\Eloquent\Model;

class Dt extends Model
{
    protected $fillable = [
        "mes_desde",
        "anio_desde",
        "mes_hasta",
        "anio_hasta",
        "empresa_id",
        "apia_id"
    ];

    public function empresa(){
        return $this->belogsTo(Empresa::class);
    }

    public function apia(){
        return $this->belongsTo(Apia::class);
    }
}
