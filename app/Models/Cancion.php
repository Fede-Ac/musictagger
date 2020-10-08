<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    // si hay problemas ver el protected por private
    //nombre de la tabla
    protected $table = 'CANCION';

    //definir clave primara de la tabla
    protected $primaryKey = 'IDcancion';

    //lista de columnas de la tabla
    protected $fillable = ['IDautor', 'titulo', 'linkLetra', 'linkVideo', 'linkSpotify', 'meGusta', 'noMeGusta'];

    //evita que se envia el update_at y created_at (puede que lo saque de cancion)
    public $timestamps = false;

    //generar las relaciones
    public function cancion_interpreta_autor()
    {
        return $this->belongsToMany('App\Models\Autor');
    }
}
