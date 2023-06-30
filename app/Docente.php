<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'docentes';

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
    protected $fillable = ['nombre', 'paterno', 'materno', 'cedula', 'curso_id'];
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
