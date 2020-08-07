<?php

namespace App\Http\Controllers\Obra;

use App\Obra;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ObraController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obras = Obra::all();
        return $this->showAll($obras);
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
            'numero' => 'required|unique:obras',
            'padron' => 'required'
        ];

        $this->validate($request, $rules);

        $campos = $request->all();

        $obra = Obra::create($campos);

        return $this->showOne($obra, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obra = Obra::findOrFail($id);

        return $this->showOne($obra);
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
        $obra = Obra::findOrFail($id);

        if($request->has('numero')){
            $obra->numero = $request->numero;
        }

        if($request->has('padron')){
            $obra->padron = $request->padron;
        }

        if($request->has('localidad_id')){
            $obra->localidad_id = $request->localidad_id;
        }

        $obra->save();

        return $this->showOne($obra);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function obraPorNumero(Request $request)
    {
        try {
            $campos = $request->all();
            $obra = Obra::where('numero', '=', $campos['numero'])->get();

            if(count($obra)==0){
                return $this->errorResponse("No existe ninguna obra ingresada con ese número", 201);
            }else{
                return $this->showOne($obra[0], 200);
            }
        }catch (Exception $e) {
            return $this->errorResponse('Error de servidor', 201);
        }
    }


    
}
