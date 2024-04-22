<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Json;

class Usuarios extends Model
{
    protected $fillable = [
        'nombre',
        'fecha_nacimiento',
        'celular',
        'experiencias',
        'idiomas',
        'archivo',
    ];

}
