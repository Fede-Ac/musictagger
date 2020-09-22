<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //nombre de la tabla
    protected $table = 'ALBUM';

    //definir clave primara de la tabla
    protected $primaryKey = 'IDalbum';

    //lista de columnas de la tabla
    protected $fillable = [ 'nombre', 'anio', 'discografica'];
    
    //evita que se envia el update_at y created_at
    public $timestamps = false; 

    //generar las relaciones
    /*
    public function join()
    {}    
    */
}
