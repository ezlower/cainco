<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'estudiantes';

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
    protected $fillable = ['nombre', 'paterno', 'materno', 'direccion', 'email'];

    
    public function cursos()
    {
        return $this->belongsTo('App\Estudiante');
    }
    
    /**
 * Get the route key for the model.
 *
 * @return string
 */
public function getRouteKeyName()
{
    return 'slug';
}
}
