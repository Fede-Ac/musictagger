<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    //nombre de la tabla
    protected $table = 'ETIQUETA';

    //definir clave primara de la tabla
    protected $primaryKey = 'IDetiqueta';

    //lista de columnas de la tabla
    protected $fillable = ['descripcion'];

    //evita que se envia el update_at y created_at
    public $timestamps = false;

    //generar las relaciones

    public function etiqueta_asigna_usuarios()
    {
        return $this->belongsTo('App\User');
    }

}
