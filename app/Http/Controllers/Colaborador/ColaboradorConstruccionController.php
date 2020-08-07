<?php

namespace App\Http\Controllers\Colaborador;

use App\Persona;
use App\Colaborador;
use App\Construccion;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ColaboradorConstruccionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Colaborador $colaborador)
    {
        $construcciones = $colaborador->construcciones;
        return $this->showAll($construcciones, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $colaborador, Construccion $construccion)
    {
        //
        $colaborador->construcciones()->syncWithoutDetaching([$construccion->id]);
        return $this->showOne($colaborador, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Colaborador $colaborador)
    {
        //
    }
}
