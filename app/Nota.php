<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'notas';

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
    protected $fillable = ['estudiante_id', 'curso_id', 'nota1', 'nota2', 'nota3', 'notafinal', 'descripcion'];

    
}
