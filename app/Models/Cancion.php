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
        protected $fillable = [ 'IDautor', 'titulo', 'linkLetra', 'linkVideo','linkSpotify'];
        
        //generar las relaciones
        public function cancion_interpreta_autor()
        {
            return $this->belongsToMany('App\Models\Autor');
        }
}