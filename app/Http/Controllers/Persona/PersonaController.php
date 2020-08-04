<?php

namespace App\Http\Controllers\Persona;

use App\Persona;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class PersonaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persona = Persona::all();

        return $this->showAll($persona);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'documento' => 'required|unique:personas',
            'primer_nombre' => 'required',
            'primer_apellido' => 'required'
        ];

        //$this->validate($request, $rules);

        $campos = $request->all();

        $persona = Persona::create($campos);

        return $this->showOne($persona, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persona = Persona::findOrFail($id);

        return $this->showOne($persona, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $persona = Persona::findOrFail($id);

        if($request->has('primer_nombre')){
            $persona->primer_nombre = $request->primer_nombre;
        }

        if($request->has('segundo_nombre')){
            $persona->segundo_nombre = $request->segundo_nombre;
        }

        if($request->has('primer_apellido')){
            $persona->primer_apellido = $request->primer_apellido;
        }

        if($request->has('segundo_apellido')){
            $persona->segundo_apellido = $request->segundo_apellido;
        }

        if(!$persona->isDirty()){
            return $this->errorResponse('Se debe especificar al menos un campo para actualizar', 422);
        }

        $persona->save();

        return $this->showOne($persona, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona  = Persona::findOrFail($id);

        $persona->delete();

        return $this->showOne($persona, 201);
    }

    public function personaPorDocumento(Request $request)
    {
        try {
            $campos = $request->all();
            $persona = Persona::where('documento', '=', $campos['documento'])->get();

            if (count($persona)==0){
                return $this->errorResponse("No existe ninguna persona ingresada con ese documento", 201);
            }else{
                return $this->showOne($persona[0], 200);
            }

        } catch (Exception $e) {
            return $this->errorResponse('Entre al problema', 201);
        }
    }
}
