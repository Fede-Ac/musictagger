<?php

namespace App\Http\Controllers;

//IMPORT

use App\Models\Autor;
use App\Models\Cancion;
use Illuminate\Http\Request;

//END IMPORT

class ControladorCancion extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        /*
    $canciones = Cancion::orderBy('id', 'ASC')->paginate(7);

    return view("home")->with('canciones', $canciones);
     */
    }

    public function create()
    {

        $autores = Autor::all();
        //dd($autores);
        return view('canciones.create', compact('autores'));

    }

    public function store(Request $request)
    {
        $canciones = new Cancion;

        //[ 'IDautor', 'titulo', 'linkLetra', 'linkVideo','linkSpotify'];
        $valid = Validator::make($request->all(), [
            
            //'IDautor' => 'required',
            'titulo' => 'required',
            //'linkLetra'    => 'required',
            //'linkVideo' => 'required',
            //'linkSpotify' => 'required',
        ]);
 
        if ($valid->fails())
        {
            return redirect()->back()->withInput()->withErrors($valid->errors());
        }
        


        if ($request->IDautor != null) {//si existe el autor
            $canciones->IDautor = $request->IDautor;
        }else{//si no existe el autor
            $autores = new Autor;
            $autores->nombre = $request->autor;
            $autores->save();
            $autoresfind = Autor::latest('IDautor')->first();
            //dd($autoresfind);
            $canciones->IDautor = $autoresfind->IDautor;
        }

        $canciones->titulo = $request->titulo;
        $canciones->linkLetra = $request->linkLetra;
        $canciones->linkVideo = $request->linkVideo;
        $canciones->linkSpotify = $request->linkSpotify;

        $canciones->save();

        return redirect('/home');
    }

    public function show() //$IDcancion

    {
        $canciones = Cancion::all();
        //$canciones = Canciones::findOrFail($IDcancion);
        //dd($autores);
        return view('canciones.show')->with('canciones', $canciones);

    }
    public function showone($IDcancion) //

    {
        $cancionesone = Cancion::findOrFail($IDcancion);
        //alldd($canciones);
        return view('canciones.show')->with('cancionesone', $cancionesone);

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
