<?php

namespace App\Http\Controllers\Empresa;

use App\Empresa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class EmpresaDireccionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empresa $empresa)
    {
        $direcciones = $empresa->direcciones;

        return $this->showAll($direcciones);
    }

}
