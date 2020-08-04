<?php

namespace App\Http\Controllers\Empresa;

use App\Empresa;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Imports\EmpresasImport;
use Maatwebsite\Excel\Facades\Excel;



class EmpresaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();

        return $this->showAll($empresas);
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
            'registro' => 'required|unique:empresas',
            'razon' => 'required',
        ];

        $this->validate($request, $rules);

        $campos = $request->all();

        $empresa = Empresa::create($campos);

        return $this->showOne($empresa, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::findOrFail($id);

        return $this->showOne($empresa, 200);
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
        $empresa = Empresa::findOrFail($id);

        if($request->has('razon')){
            $empresa->razon = $request->razon;
        }

        if(!$empresa->isDirty()){
            return $this->errorResponse('Se debe especificar al menos un campo para actualizar', 422);
        }

        $empresa->save();

        return $this->showOne($empresa, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
    }


    public function import() 
    {
        $import = new EmpresasImport();
        $import->onlySheets('empresa');

        Excel::import($import, 'so.xlsx');
        
        return redirect('/')->with('success', 'All good!');
    }

}
