<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veterinaria extends Model
{
    protected $fillable = ['user_id','nombre','logo','direccion','telefono',
                            'horario','servicios','especialidad','created_at'];
}
