<?php

namespace App;

use App\Persona;

class Colaborador extends Persona
{

    protected $table = 'personas';

    public function construcciones () {
        return $this->belongsToMany(Construccion::class);
    }
}
