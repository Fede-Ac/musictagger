<?php

namespace App\Http\Controllers;

//IMPORT 

use Illuminate\Http\Request;
use App\Models\Cancion;
use Illuminate\Support\Facades\DB;
use App\Post;
use \Illuminate\Support\Str;
//END IMPORT

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $canciones = DB::table('cancion')->paginate(5);
        $listasReproduccion = DB::table('autor')->paginate(5);//modificar
        $etiquetas = DB::table('etiqueta')->paginate(10);
        $generos = DB::table('genero')->paginate(10);
        //dd($canciones);
        return view("home", compact('canciones','listasReproduccion','etiquetas','generos'));
    }
}
