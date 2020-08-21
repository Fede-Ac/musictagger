<?php

namespace App\Http\Controllers;

//IMPORT 

use Illuminate\Http\Request;
use App\Models\Cancion;

//END IMPORT


class ControladorCancion extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    public function index()
    {
        /*
        $canciones = Cancion::orderBy('id', 'ASC')->paginate(7);

        return view("home")->with('canciones', $canciones);
        */
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $canciones = new Cancion;

        $canciones->titulo = $request->titulo;
        $canciones->linkLetra = $request->linkLetra;
        $canciones->linkVideo = $request->linkVideo;
        $canciones->linkSpotify = $request->linkSpotify;

        $canciones->save();

        return redirect('/home');
    }

    public function show($IDcancion)
    {
        $canciones = Canciones::findOrFail($IDcancion);
        //return view('usuarios.show', compact('user'));

    }

    public function edit($IDcancion)
    {
        $canciones = Cancion::findOrFail($IDcancion);
        //return view('usuarios.edit', compact('user'));
    }

    public function update(Request $request, $IDcancion)
    {

        $usuario = User::findOrFail($IDcancion);
        $canciones->titulo = $request->titulo;
        $canciones->linkLetra = $request->linkLetra;
        $canciones->linkVideo = $request->linkVideo;
        $canciones->linkSpotify = $request->linkSpotify;

        //dd($request->fechaNac); //mostrar
        $canciones->save();
        return redirect('home');
    }

    public function destroy($IDcancion)
    {
        $canciones = Cancion::findOrFail($IDcancion);
        $canciones->delete();
        return redirect('/');
    }
}
