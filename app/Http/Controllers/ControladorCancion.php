<?php

namespace App\Http\Controllers;

//IMPORT

use App\Models\Album;
use App\Models\Autor;
use App\Models\Cancion;
use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;
use App\User;

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

        //INGRESAR INTERPRETA
        if ($request->IDautor != null) { //si existe el autor
            DB::insert("INSERT INTO `interpreta`(`IDcancion`, `IDautor`) VALUES (?,?)", [$cancionfind->IDcancion,$request->IDautor]);
        }else{//si no existia el autor
            DB::insert("INSERT INTO `interpreta`(`IDcancion`, `IDautor`) VALUES (?,?)", [$cancionfind->IDcancion,$autoresfind->IDautor]);
        }

        //INGRESAR ALBUM
        if ($request->IDalbum != null) { //si existe el album
             //INSERTAR PERTENECE si existe
            DB::insert("INSERT INTO pertenece (IDcancion, IDautor,IDalbum) VALUES (?,?,?)", [$cancionfind->IDcancion, $request->IDautor, $request->IDalbum]);
        } else { //si no existe el album
            $albumes = new Album;
            $albumes->nombre = $request->albumNom;
            $albumes->anio = $request->anio;
            $albumes->discografica = $request->discografica;
            $albumes->save();

             //INSERTAR PERTENECE si no existia
            $albumfind = Album::latest('IDalbum')->first();
            DB::insert("INSERT INTO pertenece (IDcancion, IDautor,IDalbum) VALUES (?,?,?)", [$cancionfind->IDcancion, $request->IDautor, $albumfind->IDalbum]);
        }

        //INSERTAR TIENE e INTEGRA a corregir
        if ($request->IDalbum != null and $request->IDautor != null) { //si existe el album y el autor
            DB::insert("INSERT INTO `tiene`(`IDcancion`, `IDautor`, `IDalbum`, `IDgenero`) VALUES (?,?,?,?)", [$cancionfind->IDcancion, $request->IDautor, $request->IDalbum, $request->genero]);

            //DB::insert("INSERT INTO `integra`(`idUsuario`, `IDetiqueta`, `IDcancion`, `IDautor`, `IDalbum`, `IDgenero`, `cantidad`) VALUES (?,?,?,?,?,?,?)", [$request->user,1,$cancionfind->IDcancion, $request->IDautor, $request->IDalbum,$request->genero,1]);
        }elseif ($request->IDautor != null and $request->IDalbum == null){ //si existe el autor pero no el album 
            DB::insert("INSERT INTO `tiene`(`IDcancion`, `IDautor`, `IDalbum`, `IDgenero`) VALUES (?,?,?,?)", [$cancionfind->IDcancion, $request->IDautor, $albumfind->IDalbum, $request->genero]);
                        
            //DB::insert("INSERT INTO `integra`(`idUsuario`, `IDetiqueta`, `IDcancion`, `IDautor`, `IDalbum`, `IDgenero`, `cantidad`) VALUES (?,?,?,?,?,?,?)", [$request->user,1,$cancionfind->IDcancion,$request->IDautor, $albumfind->IDalbum,$request->genero,1]);
        }elseif ($request->IDautor == null and $request->IDalbum != null){ //no existe el autor pero si el album
            DB::insert("INSERT INTO `tiene`(`IDcancion`, `IDautor`, `IDalbum`, `IDgenero`) VALUES (?,?,?,?)", [$cancionfind->IDcancion, $autoresfind->IDautor, $request->IDalbum, $request->genero]);
                        
            //DB::insert("INSERT INTO `integra`(`idUsuario`, `IDetiqueta`, `IDcancion`, `IDautor`, `IDalbum`, `IDgenero`, `cantidad`) VALUES (?,?,?,?,?,?,?)", [$request->user,1,$cancionfind->IDcancion,$autoresfind->IDautor, $request->IDalbum,$request->genero,1]);
        }else{//no existe el autor y no existe el album
            DB::insert("INSERT INTO `tiene`(`IDcancion`, `IDautor`, `IDalbum`, `IDgenero`) VALUES (?,?,?,?)", [$cancionfind->IDcancion, $autoresfind->IDautor, $albumfind->IDalbum, $request->genero]);
                        
            //DB::insert("INSERT INTO `integra`(`idUsuario`, `IDetiqueta`, `IDcancion`, `IDautor`, `IDalbum`, `IDgenero`, `cantidad`) VALUES (?,?,?,?,?,?,?)", [$request->user,1,$cancionfind->IDcancion,$autoresfind->IDautor, $albumfind->IDalbum,$request->genero,1]);
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

        $cancion = DB::select("SELECT cancion.titulo AS 'TITULO', cancion.linkLetra AS 'LETRA', cancion.linkVideo AS 'VIDEO', cancion.linkSpotify AS 'MUSICA', autor.nombre AS 'AUTOR', album.nombre AS 'ALBUM', album.anio AS 'AÑO', album.discografica AS 'DISCOGRAFICA', genero.descripcion AS 'GENERO', etiqueta.descripcion AS 'ETIQUETAS'
        FROM cancion INNER JOIN interpreta on cancion.IDcancion=interpreta.IDcancion INNER JOIN autor ON interpreta.IDautor=autor.IDautor INNER JOIN pertenece ON interpreta.IDcancion=pertenece.IDcancion INNER JOIN album ON pertenece.IDalbum=album.IDalbum INNER JOIN tiene ON pertenece.IDcancion=tiene.IDcancion INNER JOIN genero ON tiene.IDgenero=genero.IDgenero INNER JOIN integra ON tiene.IDcancion=integra.IDcancion INNER JOIN etiqueta ON integra.IDetiqueta=etiqueta.IDetiqueta
        WHERE cancion.IDcancion=?;", [$IDcancion]);//BUSCAR SI ALGUN VALOR ES "" Y CAMBIARLO POR NULL PARA QUE SALGA DESCONOCIDO AL MOSTRAR
        if ($cancion == NULL){
            return "ERROR - la canción no tiene todos los datos";
        }
        //$cancion = new Cancion;
        //$cancion = DB::select("select * from cancion where IDcancion = ?", [$IDcancion]);
       
        //$cancion = collect($canciones)->filter()->all();
        //$canciones = Cancion::findOrFail($IDcancion);
        //dd($cancion);
        return view('canciones.showone', compact('cancion'));
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
