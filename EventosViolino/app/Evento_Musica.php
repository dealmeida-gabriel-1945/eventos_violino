<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento_Musica extends Model
{
    protected $fillable = [
        'especificacao', 'musica_id', 'evento_id',
    ];
}
