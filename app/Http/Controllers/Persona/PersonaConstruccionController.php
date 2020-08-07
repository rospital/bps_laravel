<?php

namespace App\Http\Controllers\Persona;

use App\Persona;
use App\Construccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;

class PersonaConstruccionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Persona $colaborador)
    {
        $construcciones = $colaborador->construcciones;
        return $this->showAll($construcciones, 200);
    }


    public function store(Request $request, Persona $colaborador, Construccion $construccion)
    {
        DB::insert('insert into construccion_persona (construccion_id, persona_id) values (?, ?)', [$construccion_id, $colaborador->id]);
        return $this->showOne($colaborador->construcciones, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function update(Persona $colaborador, Construccion $construccion)
    {
        //
        $colaborador->construcciones()->syncWithoutDetaching([$construccion->id]);
        return $this->showOne($colaborador->construcciones, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
    }

    public function agregarConstruccionPersona(Persona $persona, Construccion $construccion)
    {
        //DB::insert('insert into construccion_persona (construccion_id, persona_id) values (?, ?)', [$construccion->id, $persona->id]);
        //$persona = Persona::findOrFail($persona_id);

        //return $this->showAll($persona->construcciones, 200);

        $persona->construcciones()->syncWithoutDetaching([$construccion->id]);
        return $this->showAll($persona->construcciones, 200);
    }

    public function mostrarConstruccionesPersona(Persona $persona)
    {
        //return $this->showAll($persona->construcciones()->obra, 200);
        $construcciones = DB::select('select construcciones.fecha_desde as fecha_desde, construcciones.fecha_hasta as fecha_hasta, construcciones.tipo as tipo, obras.numero as obra, obras.padron as padron from personas inner join construccion_persona on personas.id=construccion_persona.persona_id inner join construcciones on construccion_persona.construccion_id=construcciones.id inner join obras on construcciones.obra_id=obras.id where personas.id=?', [$persona->id]);
        //return $this->showAll($construcciones, 200);

        return response()->json(['data' => $construcciones], 200);
    }
}
