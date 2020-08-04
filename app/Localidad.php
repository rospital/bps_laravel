<?php

namespace App;

use App\Departamento;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    protected $table = 'localidades';

    protected $fillable = [
        "nombre",
        "departamento_id"
    ];

    public function departamento (){
        return $this->belongsTo(Departamento::class);
    }

    public function obras () {
        return $this->hasMany(Obra::class);
    }
}
