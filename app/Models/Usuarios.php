<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsJson;

class User extends Model
{
    protected $fillable = [
        'nombre',
        'fecha_nacimiento',
        'celular',
        'experiencias',
        'idiomas',
        'archivo',
    ];

    protected $casts = [
        'experiencias' => AsJson::class,
        'idiomas' => AsJson::class,
    ];
}
