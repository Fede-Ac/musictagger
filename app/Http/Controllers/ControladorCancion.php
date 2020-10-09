<?php

namespace App\Http\Controllers;

//IMPORT

use App\Models\Album;
use App\Models\Autor;
use App\Models\Cancion;
use App\Models\Etiqueta;
use App\Models\Genero;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//END IMPORT

class ControladorCancion extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        $autores = Autor::all();
        $albumes = Album::all();
        $generos = Genero::all();
        $etiquetas = Etiqueta::all();
        //dd($autores);
        return view('canciones.create', compact('autores', 'albumes', 'generos', 'etiquetas'));
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
            DB::insert("INSERT INTO `interpreta`(`IDcancion`, `IDautor`) VALUES (?,?)", [$cancionfind->IDcancion, $request->IDautor]);
        } else { //si no existia el autor
            DB::insert("INSERT INTO `interpreta`(`IDcancion`, `IDautor`) VALUES (?,?)", [$cancionfind->IDcancion, $autoresfind->IDautor]);
        }

        //INGRESAR ALBUM
        if ($request->IDalbum != null) { //si existe el album
            //INSERTAR PERTENECE si existe
            if ($request->IDautor != null) {
                DB::insert("INSERT INTO pertenece (IDcancion, IDautor,IDalbum) VALUES (?,?,?)", [$cancionfind->IDcancion, $request->IDautor, $request->IDalbum]);
            } else {
                DB::insert("INSERT INTO pertenece (IDcancion, IDautor,IDalbum) VALUES (?,?,?)", [$cancionfind->IDcancion, $autoresfind->IDautor, $request->IDalbum]);
            }
        } else { //si no existe el album
            $albumes = new Album;
            $albumes->nombre = $request->albumNom;
            $albumes->anio = $request->anio;
            $albumes->discografica = $request->discografica;
            $albumes->save();

            //INSERTAR PERTENECE si no existia
            $albumfind = Album::latest('IDalbum')->first();
            if ($request->IDautor != null) {
                //INSERTAR PERTENECE si el autor existe
                DB::insert("INSERT INTO pertenece (IDcancion, IDautor,IDalbum) VALUES (?,?,?)", [$cancionfind->IDcancion, $request->IDautor, $albumfind->IDalbum]);
            } else {
                //INSERTAR PERTENECE si el autor no esistia
                DB::insert("INSERT INTO pertenece (IDcancion, IDautor,IDalbum) VALUES (?,?,?)", [$cancionfind->IDcancion, $autoresfind->IDautor, $albumfind->IDalbum]);
            }
        }

        if ($request->idEtiqueta != null) {
            //INSERTAR ASIGNA
            DB::insert("INSERT INTO `asigna`(`idUsuario`, `IDetiqueta`) VALUES (?,?)", [$request->user, $request->idEtiqueta]);

            //INSERTAR TIENE e INTEGRA (CON ETIQUETA)
            if ($request->IDalbum != null and $request->IDautor != null) { //si existe el album y el autor
                DB::insert("INSERT INTO `tiene`(`IDcancion`, `IDautor`, `IDalbum`, `IDgenero`) VALUES (?,?,?,?)", [$cancionfind->IDcancion, $request->IDautor, $request->IDalbum, $request->genero]);

                DB::insert("INSERT INTO `integra`(`idUsuario`, `IDetiqueta`, `IDcancion`, `IDautor`, `IDalbum`, `IDgenero`, `cantidad`) VALUES (?,?,?,?,?,?,?)", [$request->user, $request->idEtiqueta, $cancionfind->IDcancion, $request->IDautor, $request->IDalbum, $request->genero, 1]);
            } elseif ($request->IDautor != null and $request->IDalbum == null) { //si existe el autor pero no el album
                DB::insert("INSERT INTO `tiene`(`IDcancion`, `IDautor`, `IDalbum`, `IDgenero`) VALUES (?,?,?,?)", [$cancionfind->IDcancion, $request->IDautor, $albumfind->IDalbum, $request->genero]);

                DB::insert("INSERT INTO `integra`(`idUsuario`, `IDetiqueta`, `IDcancion`, `IDautor`, `IDalbum`, `IDgenero`, `cantidad`) VALUES (?,?,?,?,?,?,?)", [$request->user, $request->idEtiqueta, $cancionfind->IDcancion, $request->IDautor, $albumfind->IDalbum, $request->genero, 1]);
            } elseif ($request->IDautor == null and $request->IDalbum != null) { //no existe el autor pero si el album
                DB::insert("INSERT INTO `tiene`(`IDcancion`, `IDautor`, `IDalbum`, `IDgenero`) VALUES (?,?,?,?)", [$cancionfind->IDcancion, $autoresfind->IDautor, $request->IDalbum, $request->genero]);

                DB::insert("INSERT INTO `integra`(`idUsuario`, `IDetiqueta`, `IDcancion`, `IDautor`, `IDalbum`, `IDgenero`, `cantidad`) VALUES (?,?,?,?,?,?,?)", [$request->user, $request->idEtiqueta, $cancionfind->IDcancion, $autoresfind->IDautor, $request->IDalbum, $request->genero, 1]);
            } else { //no existe el autor y no existe el album
                DB::insert("INSERT INTO `tiene`(`IDcancion`, `IDautor`, `IDalbum`, `IDgenero`) VALUES (?,?,?,?)", [$cancionfind->IDcancion, $autoresfind->IDautor, $albumfind->IDalbum, $request->genero]);

                DB::insert("INSERT INTO `integra`(`idUsuario`, `IDetiqueta`, `IDcancion`, `IDautor`, `IDalbum`, `IDgenero`, `cantidad`) VALUES (?,?,?,?,?,?,?)", [$request->user, $request->idEtiqueta, $cancionfind->IDcancion, $autoresfind->IDautor, $albumfind->IDalbum, $request->genero, 1]);
            }
        } else { //INSERTAR TIENE (SIN ETIQUETA)
            if ($request->IDalbum != null and $request->IDautor != null) { //si existe el album y el autor
                DB::insert("INSERT INTO `tiene`(`IDcancion`, `IDautor`, `IDalbum`, `IDgenero`) VALUES (?,?,?,?)", [$cancionfind->IDcancion, $request->IDautor, $request->IDalbum, $request->genero]);
            } elseif ($request->IDautor != null and $request->IDalbum == null) { //si existe el autor pero no el album
                DB::insert("INSERT INTO `tiene`(`IDcancion`, `IDautor`, `IDalbum`, `IDgenero`) VALUES (?,?,?,?)", [$cancionfind->IDcancion, $request->IDautor, $albumfind->IDalbum, $request->genero]);
            } elseif ($request->IDautor == null and $request->IDalbum != null) { //no existe el autor pero si el album
                DB::insert("INSERT INTO `tiene`(`IDcancion`, `IDautor`, `IDalbum`, `IDgenero`) VALUES (?,?,?,?)", [$cancionfind->IDcancion, $autoresfind->IDautor, $request->IDalbum, $request->genero]);
            } else { //no existe el autor y no existe el album
                DB::insert("INSERT INTO `tiene`(`IDcancion`, `IDautor`, `IDalbum`, `IDgenero`) VALUES (?,?,?,?)", [$cancionfind->IDcancion, $autoresfind->IDautor, $albumfind->IDalbum, $request->genero]);
            }
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
        $cancion = DB::select("SELECT cancion.IDCancion AS 'ID', cancion.titulo AS 'TITULO', cancion.linkLetra AS 'LETRA', cancion.linkVideo AS 'VIDEO', cancion.linkSpotify AS 'MUSICA', cancion.meGusta AS 'MEGUSTA', cancion.noMeGusta AS 'NOMEGUSTA', autor.nombre AS 'AUTOR', album.nombre AS 'ALBUM', album.anio AS 'AÑO', album.discografica AS 'DISCOGRAFICA', genero.descripcion AS 'GENERO', etiqueta.descripcion AS 'ETIQUETAS'
        FROM cancion INNER JOIN interpreta on cancion.IDcancion=interpreta.IDcancion INNER JOIN autor ON interpreta.IDautor=autor.IDautor INNER JOIN pertenece ON interpreta.IDcancion=pertenece.IDcancion INNER JOIN album ON pertenece.IDalbum=album.IDalbum INNER JOIN tiene ON pertenece.IDcancion=tiene.IDcancion INNER JOIN genero ON tiene.IDgenero=genero.IDgenero INNER JOIN integra ON tiene.IDcancion=integra.IDcancion INNER JOIN etiqueta ON integra.IDetiqueta=etiqueta.IDetiqueta
        WHERE cancion.IDcancion=?;", [$IDcancion]); //BUSCAR SI ALGUN VALOR ES "" Y CAMBIARLO POR NULL PARA QUE SALGA DESCONOCIDO AL MOSTRAR
        if ($cancion == null) {
            $cancion = DB::select("SELECT cancion.IDCancion AS 'ID', cancion.titulo AS 'TITULO', cancion.linkLetra AS 'LETRA', cancion.linkVideo AS 'VIDEO', cancion.linkSpotify AS 'MUSICA', cancion.meGusta AS 'MEGUSTA', cancion.noMeGusta AS 'NOMEGUSTA', autor.nombre AS 'AUTOR', album.nombre AS 'ALBUM', album.anio AS 'AÑO', album.discografica AS 'DISCOGRAFICA', genero.descripcion AS 'GENERO'
            FROM cancion INNER JOIN interpreta on cancion.IDcancion=interpreta.IDcancion INNER JOIN autor ON interpreta.IDautor=autor.IDautor INNER JOIN pertenece ON interpreta.IDcancion=pertenece.IDcancion INNER JOIN album ON pertenece.IDalbum=album.IDalbum INNER JOIN tiene ON pertenece.IDcancion=tiene.IDcancion INNER JOIN genero ON tiene.IDgenero=genero.IDgenero
            WHERE cancion.IDcancion=?;", [$IDcancion]);
            if ($cancion == null) {
                return "ERROR - la canción no tiene todos los datos";
            }
        }
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
        return redirect('home');
    }

    public function destroy($IDcancion)
    {
        $canciones = Cancion::findOrFail($IDcancion);
        $canciones->delete();
        return redirect('/');
    }

    public function meGusta($IDcancion, $idUsuario)
    {
        //ver si el usuario ya le dió me gusta a la canción (falta)
        $conSelect = DB::select("SELECT `califico` FROM `usuario` WHERE `idUsuario`= ?", [$idUsuario]);

        if (collect($conSelect[0])->get('califico') == 0) {
            //buscar la canción, sumarle 1 a me gusta y actualizar el valor
            $consultaSelect = DB::select("SELECT `IDcancion`, `meGusta` FROM `cancion` WHERE IDcancion=?;", [$IDcancion]);
            $meGusta = collect($consultaSelect[0])->get('meGusta') + 1;
            $consulta = DB::update("UPDATE `cancion` SET `meGusta`=? WHERE IDcancion=?", [$meGusta, $IDcancion]);
            $consultaCalifico = DB::update("UPDATE `usuario` SET `califico`=true WHERE `idUsuario`= ?", [$idUsuario]);
        } else {
            //buscar la canción, restarle 1 a no me gusta y actualizar el valor
            $consultaSelect = DB::select("SELECT `IDcancion`, `MeGusta` FROM `cancion` WHERE IDcancion=?;", [$IDcancion]);
            $MeGusta = collect($consultaSelect[0])->get('MeGusta') - 1;
            if ($MeGusta < 0) {
                $MeGusta = 0;
            }
            $consulta = DB::update("UPDATE `cancion` SET `MeGusta`=? WHERE IDcancion=?", [$MeGusta, $IDcancion]);
            $consultaCalifico = DB::update("UPDATE `usuario` SET `califico`=false WHERE `idUsuario`= ?", [$idUsuario]);
        }
        return back();
        //return redirect()->to('/route');
    }

    public function noMeGusta($IDcancion, $idUsuario)
    {
        //ver si el usuario ya le dió no gusta a la canción (falta)
        $conSelect = DB::select("SELECT `califico` FROM `usuario` WHERE `idUsuario`= ?", [$idUsuario]);

        if (collect($conSelect[0])->get('califico') == 0) {
            //buscar la canción, sumarle 1 a no me gusta y actualizar el valor
            $consultaSelect = DB::select("SELECT `IDcancion`, `noMeGusta` FROM `cancion` WHERE IDcancion=?;", [$IDcancion]);
            $noMeGusta = collect($consultaSelect[0])->get('noMeGusta') + 1;
            $consulta = DB::update("UPDATE `cancion` SET `noMeGusta`=? WHERE IDcancion=?", [$noMeGusta, $IDcancion]);
            $consultaCalifico = DB::update("UPDATE `usuario` SET `califico`=true WHERE `idUsuario`= ?", [$idUsuario]);
        } else {
            //buscar la canción, restarle 1 a no me gusta y actualizar el valor
            $consultaSelect = DB::select("SELECT `IDcancion`, `noMeGusta` FROM `cancion` WHERE IDcancion=?;", [$IDcancion]);
            $noMeGusta = collect($consultaSelect[0])->get('noMeGusta') - 1;
            if ($noMeGusta < 0) {
                $noMeGusta = 0;
            }
            $consulta = DB::update("UPDATE `cancion` SET `noMeGusta`=? WHERE IDcancion=?", [$noMeGusta, $IDcancion]);
            $consultaCalifico = DB::update("UPDATE `usuario` SET `califico`=false WHERE `idUsuario`= ?", [$idUsuario]);
        }
        return back();
    }
}
