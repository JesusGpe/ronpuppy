<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    protected $fillable = ['id','nombre','tipo','fecha_nac','sexo','foto','email'];
}
