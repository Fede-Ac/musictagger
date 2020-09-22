<?php

namespace App\Http\Controllers;

//IMPORT 

use Illuminate\Http\Request;
use App\User;

//END IMPORT

class CRUDusuariosControlador extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $usuario = new Usuario;

        $usuario->email = $request->nombre;
        $usuario->nombre = $request->nombre;
        $usuario->fechaNac = $request->nombre;
        $usuario->password = bcrypt($request->password);

        $usuario->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idUsuario)
    {
        $user = User::findOrFail($idUsuario);
        return view('usuarios.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idUsuario)
    {
        $user = User::findOrFail($idUsuario);
        return view('/usuarios/modificar/', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idUsuario)
    {

        $usuario = User::findOrFail($idUsuario);
        $usuario->email = $request->email;
        $usuario->nombre = $request->name;
        $usuario->fechaNac = $request->fechaNac;
        $usuario->password = bcrypt($request->password);

        //dd($request->fechaNac); //mostrar
        $usuario->save();
        return redirect('/home');
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
        return redirect('/');
    }
}
