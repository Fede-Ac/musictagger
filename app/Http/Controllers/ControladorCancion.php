<?php

namespace App\Http\Controllers;

//IMPORT

use App\Models\Album;
use App\Models\Autor;
use App\Models\Cancion;
use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
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
        $albumes = Album::all();
        $generos = Genero::all();
        //dd($autores);
        return view('canciones.create', compact('autores', 'albumes', 'generos'));
    }

    public function store(Request $request)
    {
        $canciones = new Cancion;
        /*
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
         */
        //INGRESAR UN AUTOR
        if ($request->IDautor != null) { //si existe el autor
            $canciones->IDautor = $request->IDautor;
        } else { //si no existe el autor
            $autores = new Autor;
            $autores->nombre = $request->autor;
            $autores->save();

            $autoresfind = Autor::latest('IDautor')->first();
            $canciones->IDautor = $autoresfind->IDautor;
        }
        //INGRESAR CANCION
        $canciones->titulo = $request->titulo;
        $canciones->linkLetra = $request->linkLetra;
        $canciones->linkVideo = $request->linkVideo;
        $canciones->linkSpotify = $request->linkSpotify;
        $canciones->save();

        $cancionfind = Cancion::latest('IDcancion')->first();

        //INGRESAR ALBUM
        if ($request->IDalbum != null) { //si existe el album
            DB::insert("INSERT INTO pertenece (IDcancion, IDautor,IDalbum) VALUES (?,?,?)", [$cancionfind->IDcancion, $request->IDautor, $request->IDalbum]);
        } else { //si no existe el album
            $albumes = new Album;
            $albumes->nombre = $request->albumNom;
            $albumes->anio = $request->anio;
            $albumes->discografica = $request->discografica;
            $albumes->save();

            $albumfind = Album::latest('IDalbum')->first();
            DB::insert("INSERT INTO pertenece (IDcancion, IDautor,IDalbum) VALUES (?,?,?)", [$cancionfind->IDcancion, $request->IDautor, $albumfind->IDalbum]);
        }

        return redirect('/home');
    }

    public function show() //$IDcancion

    {
        $canciones = Cancion::all();
        //$canciones = Canciones::findOrFail($IDcancion);
        //dd($autores);
        return view('canciones.show')->with('canciones', $canciones);
    }
    public function showone($IDcancion)

    {
        /*
        $canciones = DB::select("SELECT cancion.titulo AS 'TITULO', cancion.linkLetra AS 'LETRA', cancion.linkVideo AS 'VIDEO', cancion.linkSpotify AS 'MUSICA', autor.nombre AS 'AUTOR', album.nombre AS 'ALBUM', album.anio AS 'AÑO', album.discografica AS 'DISCOGRAFICA', genero.descripcion AS 'GENERO', etiqueta.descripcion AS 'ETIQUETAS' FROM cancion,autor,album,genero,etiqueta,integra,tiene WHERE (tiene.IDcancion = cancion.IDcancion) AND (tiene.IDautor = autor.IDautor) AND (tiene.IDalbum = album.IDalbum) AND (tiene.IDgenero = genero.IDgenero) AND (tiene.IDcancion = integra.IDcancion) AND (integra.IDetiqueta = etiqueta.descripcion) AND (tiene.IDcancion = ?)", [$IDcancion]);
        */
        $cancion = new Cancion;
        $cancion = DB::select("select * from cancion where IDcancion = ?", [$IDcancion]);
        $colCancion = collect($cancion);
        //$canciones = Cancion::findOrFail($IDcancion);
        //dd($cancion);
        return view('canciones.showone', compact('colCancion'));
    }

    public function edit($IDcancion)
    {
        $cancion = Cancion::findOrFail($IDcancion);
        dd($cancion);
        return view('canciones.edit', compact('cancion'));
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
