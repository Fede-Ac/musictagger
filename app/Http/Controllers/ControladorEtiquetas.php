<?php

namespace App\Http\Controllers;

//IMPORT


use App\Models\Etiqueta;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //sirve para ahcer consultas a la base de datos (DB:: ...)

//END IMPORT


class ControladorEtiquetas extends Controller
{
    public function index()
    {
        return view('etiquetas.create');
    }
    public function store(Request $request)
    {
        $etiquetas = new Etiqueta;//creas el objeto
        $etiquetas->descripcion = $request->descripcion; //guardas el dato del parametro en el objeto (tabla)
        $etiquetas->save();//guarda el dato en la BD
        return "llegue a store $request->descripcion";
    }
    public function update()
    {
        return "llegue a update";
    }
    public function destroy($id)
    {
        return "llegue a destroy";
    }
}