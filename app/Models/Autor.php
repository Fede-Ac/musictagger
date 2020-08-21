<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    //nombre de la tabla
    protected $table = 'AUTOR';

    //definir clave primara de la tabla
    protected $primaryKey = 'IDautor';

    //lista de columnas de la tabla
    protected $fillable = [ 'nombre'];
    
    //generar las relaciones
    public function autor_interpreta_cancion()
    {
        return $this->belongsToMany('App\Models\Cancion');
    }
}
