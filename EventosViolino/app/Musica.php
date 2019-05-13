<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    protected $fillable = [
        'nome', 'observacao', 'usuario_id',
    ];

    public function usuario()
    {
    	return $this->belongsTo('App\Usuario');
    }
    public function versoes()
    {
    	return $this->hasMany('App\Versao_Musica');
    }
}
