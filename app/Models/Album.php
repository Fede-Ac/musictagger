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
    
    //generar las relaciones
    /*
    public function join()
    {}    
    */
}
