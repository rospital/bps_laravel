<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();

        return $this->showAll($usuarios);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $rules = [
            'name' => 'required',
            'apodo' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ];

        $this->validate($request, $rules);
*/      
        $campos = $request->all();
        
        $data = User::where('username', '=', $campos["username"])
            ->orWhere('email', '=', $campos["email"])
            ->get();
        //

        if(count($data) > 0){

            if($data[0]->username == $campos["username"]){
                $error = 'Ya existe un usuario con ese nombre de usuario';
            }else{
                $error = 'Ya existe un usuario con ese email';
            }
            return $this->errorResponse($error, 201);
        };
        $token = User::generarVerificationToken();
        $campos['password'] = sha1($request->password);
        $campos['verified'] = User::USUARIO_NO_VERIFICADO;
        $campos['verification_token'] = $token;
        $campos['admin'] = User::USUARIO_REGULAR;
        
        $usuario = User::create($campos);

        return response()->json(['token' => $token, 'data' => $usuario], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$usuario = User::find($id);
        $usuario = User::findOrFail($id);

        return $this->showOne($usuario, 200);
    }

    public function userByUsername($username)
    {
        $usuario = User::where('username', $username)->first();

        return $this->showOne($usuario, 200);
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
        $usuario = User::findOrFail($id);

        $rules = [
            'email' => 'email|unique:users',
            'password' => 'min:6|confirmed',
            'admin' => 'in:' . User::USUARIO_ADMINISTRADOR . ',' . User::USUARIO_REGULAR
        ];

        $this->validate($request, $rules);

        if ($request->has('name')){
            $usuario->name = $request->name;
        }

        if ($request->has('email') && $usuario->email != $request->email){
            $usuario->verified = User::USUARIO_NO_VERIFICADO;
            $usuario->verification_token = User::generarVerificationToken();
            $usuario->email = $request->email;
        }

        if($request->has('password')){
            $usuario->password = bcrypt($request->password);
        }

        if($request->has('admin')){
            if(!$usuario->esVerificado()){
                return $this->errorResponse('Unicamente los usuarios verificados pueden cambiar su valor de administrador', 409);
            }

            $usuario->admin = $request->admin;
        }

        if(!$usuario->isDirty()){
            return $this->errorResponse('Se debe especificar al menos un campo para actualizar', 422);
        }

        $usuario->save();

        return $this->showOne($usuario, 200);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);

        $usuario->delete();

        return $this->showOne($usuario, 201);
    }

    public function autenticarUsuario(Request $request)
    {
        
        try { 
            
            $campos = $request->all();
            $usuario = User::where("username", "=", $campos["username"])->get();

            if(count($usuario)==0){
                return $this->errorResponse("El nombre de usuario es incorrecto", 201);
            }
            $passCorrecto = sha1($campos["password"]) == $usuario[0]["password"];

            if(!$passCorrecto){
                return $this->errorResponse("El password es incorrecto", 201);
            }
            //return $this->showOne($usuario[0], 200);
            return response()->json(['token' => $usuario[0]["verification_token"], 'data' => $usuario[0]], 200);
        } catch (Exception $e) { 
            return $this->errorResponse('Entre al problema', 201);
        }
    }

    // Esta parte habria que modificar, ya que no es muy seguro mandar el token
    public function usuarioToken($token)
    {
        try{
            $usuario = User::where("verification_token", "=", $token)->get();
            return response()->json(['data' => $usuario[0]], 200);
        } catch (Exception $e) { 
            return $this->errorResponse('Entre al problema', 201);
        }
    }
}
