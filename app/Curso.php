<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cursos';

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
    protected $fillable = ['nombre', 'descripcion', 'periodo_id'];
   
    public function estudiantes()
    {
        return $this->hasmany('App\Curso');
    }
    
    
}
    