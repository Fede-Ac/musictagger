<?php

namespace App\Http\Controllers;

//IMPORT 

use Illuminate\Http\Request;
use App\Models\Cancion;
use Illuminate\Support\Facades\DB;

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
        $canciones = DB::table('cancion')->get();
        $listaReproduccion = DB::table('autor')->get();
        //$canciones = Cancion::orderBy('IDcancion', 'ASC');//->paginate(7);
        //dd($canciones);
        return view("home")->with('canciones', $canciones);
    }
}
