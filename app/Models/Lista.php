<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
        //nombre de la tabla
        protected $table = 'LISTA';

        //definir clave primara de la tabla
        protected $primaryKey = 'IDlista';
    
        //lista de columnas de la tabla
        protected $fillable = [ 'descripcion', 'publica'];
        
        //generar las relaciones
        public function lista_crea_usuario()
        {
                return $this->belongsTo('App\User');
        }
        /*
        public function lista_contiene_agregacion()
        {
            return $this->belongsToMany('App\');
        }
        */
}
