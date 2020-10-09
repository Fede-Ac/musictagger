<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'usuario';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //definir clave primara de la tabla
    protected $primaryKey = 'idUsuario';

    //lista de columnas de la tabla
    protected $fillable = [ 'email', 'nombre', 'fechaNac', 'password', 'califico'];
    
    //generar las relaciones
    
    public function usuario_crea_lista()
    {
        return $this->hasMany('App\Models\Lista');
    }    
    public function usuario_asigna_etiqueta()
    {
        return $this->hasMany('App\Models\Etiqueta');
    }   
    public function usuario_sigue_usuario()
    {
        return $this->belongsToMany('App\User');
    }   

    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
