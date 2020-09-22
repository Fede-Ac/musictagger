<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    //nombre de la tabla
    protected $table = 'GENERO';

    //definir clave primara de la tabla
    protected $primaryKey = 'IDgenero';

    //lista de columnas de la tabla
    protected $fillable = ['descripcion'];

    //evita que se envia el update_at y created_at
    public $timestamps = false;

    //generar las relaciones
    /*
public function join()
{}
 */
}
