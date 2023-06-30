<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rango extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rangos';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'duracion', 'fecha_inicio', 'fecha_final', 'periodo_id'];

    
}
