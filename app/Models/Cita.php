<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';

    protected $fillable = [
        'cliente',
        'telefono',
        'diseno',
        'zona_cuerpo',
        'fecha_hora',
        'estado'
    ];
}


