<?php

namespace App;

use App\Dt;
use App\User;
use App\Empresa;
use Illuminate\Database\Eloquent\Model;

class Semiomisa extends Model
{
    protected $fillable = [
        "mes_desde",
        "anio_desde",
        "mes_hasta",
        "anio_hasta",
        "user_id",
        "empresa_id",
        "dt_id"
    ];

    public function dt(){
        return $this->belogsTo(Dt::class);
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
