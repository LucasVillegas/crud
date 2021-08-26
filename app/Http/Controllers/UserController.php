<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Persona;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function list_rol()
    {
        $rol = DB::table('rol')->get();
        return  response()->json($rol);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = new Persona;
        $persona = $this->persona($request, $persona);
        DB::beginTransaction();
        try {

            $persona->save();

            if ($persona) {
                $user = new User;
                $user = $this->user($request, $user, $persona);
                $user->save();
            } else {
                return response()->json(0);
            }
            DB::commit();

            return response()->json(1);
        } catch (\Exception $ex) {
            return response()->json(['warning' => $ex->getMessage()]);
        }
    }

    // Funcion para agregar a la persona
    public function persona($request, $persona)
    {
        $persona->identificacion = $request->identificacion;
        $persona->nombre = $request->nombres;
        $persona->apellido = $request->apellidos;

        return $persona;
    }

    // Funcion para agregar al Usuario
    public function user($request, $user, $persona)
    {
        $user->username = $request->usuario;
        $user->persona_id  = $persona->id;
        $user->rol_id  = $request->rol;
        $user->password    = Hash::make($request->password);
        $user->estado  = 1;
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $user = DB::table('persona')
            ->join('users', 'persona.id', '=', 'users.persona_id')
            ->join('rol', 'users.rol_id', '=', 'rol.id')
            ->select('*', 'persona.id as persona_id')
            ->get();
        $json = array();
        foreach ($user as $row) {
            $json["data"][] = array(
                'persona_id' => $row->persona_id,
                'identificacion' => $row->identificacion,
                'nombre' => $row->nombre,
                'apellido' => $row->apellido,
                'usuario' => $row->username,
                'rol' => $row->rol,
                'estado' => $row->estado,
            );
        }
        return  response()->json($json);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('persona')
            ->join('users', 'persona.id', '=', 'users.persona_id')
            ->join('rol', 'users.rol_id', '=', 'rol.id')
            ->select('*', 'persona.id as persona_id')
            ->where('persona.id', '=', $id)
            ->get();
        return  response()->json($user);
    }


    public function edit_cuenta($id)
    {
        $user = DB::table('persona')
            ->join('users', 'persona.id', '=', 'users.persona_id')
            ->join('rol', 'users.rol_id', '=', 'rol.id')
            ->select('*', 'users.id as user_id')
            ->where('persona.id', '=', $id)
            ->get();
        return  response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $persona = $this->update_persona($request);
        //$user = $this->update_user($request, $persona);
        DB::beginTransaction();

        try {

            $persona->save();

            DB::commit();

            return response()->json(1);
        } catch (\Exception $ex) {
            return response()->json(['warning' => $ex->getMessage()]);
        }
    }

    public function update_persona($request)
    {

        //ahora consulto el id de la tabla persona para realizar el update
        $persona = Persona::findOrFail($request->id);

        $persona->identificacion   = $request->identificacion_update;
        $persona->nombre   = $request->nombres_update;
        $persona->apellido = $request->apellidos_update;

        return $persona;
    }

    public function update_cuenta(Request $request)
    {

        //consultar el usuario que pertenece a la persona del update

        //consulta  del usuario para el update
        $user = User::findorFail($request->ids);
        if ($request->usuario_updates) {
            $user->username    = $request->usuario_updates;
            $user->rol_id    = $request->rol_updates;
            $user->password = Hash::make($request->clave_updates);

            $user->save();
        }
        return response()->json(1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Persona::find($id);
        $user->delete();
        return response()->json(1);
    }
}