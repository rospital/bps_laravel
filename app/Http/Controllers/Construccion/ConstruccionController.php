<?php

namespace App\Http\Controllers\Construccion;

use App\Construccion;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ConstruccionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $construccion = Construccion::all();
        return $this->showAll($construccion, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'fecha_desde' => 'required',
            'fecha_hasta' => 'required',
            'obra_id' => 'required'
        ];

        //$this->validate($request, $rules);

        $campos = $request->all();
        $campos['tipo'] = Construccion::TIPO_AUTOCONSTRUCCION;

        $existe = Construccion::where('fecha_desde', '=', $campos["fecha_desde"])
                    ->where('fecha_hasta', '=', $campos["fecha_hasta"])
                    ->where('obra_id', '=', $campos['obra_id'])
                    ->get();
        
        if(count($existe)==0){
            $construccion = Construccion::create($campos);
            return $this->showOne($construccion, 200);
        }else{
            return $this->showOne($existe[0], 200);
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function construccionPorPeriodoYObra(Request $request){
        try {
            $campos = $request->all();
            $construccion = Construccion::where('fecha_desde', '=', $campos['fecha_desde'])
                            ->where('fecha_hasta', '=', $campos['fecha_hasta'])
                            ->where('obra_id', '=', $campos['obra_id'])
                            ->get();
            if(count($construccion) == 0){
                return $this->errorResponse("No existe ninguna periodo de colaboracion", 201);
            }else{
                return $this->showOne($construccion[0], 200);
            }
        } catch (Exception $e) {
            return $this->errorResponse('Error de servidor', 201);
        }
    }

}
