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
    
    //evita que se envia el update_at y created_at
    public $timestamps = false; 

    //generar las relaciones
    public function autor_interpreta_cancion()
    {
        return $this->belongsToMany('App\Models\Cancion');
    }
}
