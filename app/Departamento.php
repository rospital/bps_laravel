<?php

namespace App;

use App\Localidad;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = [
        "nombre"
    ];

    public function localidades(){
        return $this->hasMany(Localidad::class);
    }
}
