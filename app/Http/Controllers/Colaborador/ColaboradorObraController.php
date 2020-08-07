<?php

namespace App\Http\Controllers\Colaborador;

use App\Colaborador;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ColaboradorObraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Colaborador $colaborador)
    {
        /*
        $products = $buyer->transactions()->with('product')->get()->pluck('product');
        */
        return 1;
    }
}