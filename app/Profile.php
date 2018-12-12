<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id','nombre','tipom','fecha_nac','sexo','imagen','direccion','telefono','horario',
                        'servicios','especialidad','tipo'];
}
