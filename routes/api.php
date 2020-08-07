<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);
//Route::get('users/{username}/username', 'User\UserController@userByUsername');
Route::post('auth', 'User\UserController@autenticarUsuario');
Route::get('usuarioToken/{token}', 'User\UserController@usuarioToken');

Route::resource('empresas', 'Empresa\EmpresaController', ['except' => ['create', 'edit']]);
Route::resource('empresas.direcciones', 'Empresa\EmpresaDireccionController', ['only' => ['index']]);
Route::resource('empresas.emails', 'Empresa\EmpresaEmailController', ['only' => ['index']]);


Route::resource('personas', 'Persona\PersonaController', ['except' => ['create', 'edit']]);
Route::post('personaPorDocumento', 'Persona\PersonaController@personaPorDocumento');

Route::resource('personas.obras', 'Persona\PersonaObraController', ['only' => ['index']]);
Route::resource('personas.construcciones', 'Persona\PersonaConstruccionController', ['except' => ['create', 'edit']]);

Route::get('agregarConstruccionPersona/persona/{persona}/construccion/{construccion}', 'Persona\PersonaConstruccionController@agregarConstruccionPersona');
Route::get('mostrarConstruccionesPersona/persona/{persona}', 'Persona\PersonaConstruccionController@mostrarConstruccionesPersona');

Route::resource('colaboradores', 'Colaborador\ColaboradorController', ['except' => ['create', 'edit']]);
Route::resource('colaboradores.obras', 'Colaborador\ColaboradorObraController', ['only' => ['index']]);
Route::resource('colaboradores.contrucciones', 'Colaborador\ColaboradorConstruccionController', ['only' => ['index', 'update']]);

Route::resource('representantes', 'Representante\RepresentanteController', ['except' => ['create', 'edit']]);

Route::resource('titulares', 'Titular\TitularController', ['except' => ['create', 'edit']]);

Route::resource('construcciones', 'Construccion\ConstruccionController', ['except' => ['create', 'edit']]);
Route::post('construccionPorPeriodoYObra', 'Construccion\ConstruccionController@construccionPorPeriodoYObra');

Route::resource('obras', 'Obra\ObraController', ['except' => ['create', 'edit']]);
Route::post('obraPorNumero', 'Obra\ObraController@obraPorNumero');


Route::resource('direcciones', 'Direccion\DireccionController', ['except' => ['create', 'edit']]);
//Route::get('direcciones/{empresa_id}', 'Direccion\DireccionController@direccionesPorIdEmpresa');
//Route::resource('direcciones.empresas', 'Direccion\DireccionEmpresaController', ['only' => ['index']]);

Route::resource('telefonos', 'Telefono\TelefonoController', ['except' => ['create', 'edit']]);
Route::get('telefonos/{empresa_id}', 'Telefono\TelefonoController@telefonosPorIdEmpresa');

Route::resource('emails', 'Email\EmailController', ['except' => ['create', 'edit']]);
Route::get('emails/{empresa_id}', 'Email\EmailController@emailsPorIdEmpresa');

Route::resource('dts', 'Dt\DtController', ['except' => ['create', 'edit']]);
Route::get('dts/{empresa_id}', 'Dt\DtController@dtsPorIdEmpresa');

Route::resource('apias', 'Apia\ApiaController', ['except' => ['create', 'edit']]);

Route::resource('historias', 'Historia\HistoriaController', ['except' => ['create', 'edit']]);

Route::resource('semiomisas', 'Semiomisa\SemiomisaController', ['except' => ['create', 'edit']]);

Route::resource('desempleos', 'Desempleo\DesempleoController', ['except' => ['create', 'edit']]);

Route::resource('dnps', 'Dnp\DnpController', ['except' => ['create', 'edit']]);


Route::get('import-empresas', 'Empresa\EmpresaController@import');



