<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Versao_Musica extends Model
{
    protected $fillable = [
        'sub_nome', 'artista', 'tom', 'observacao', 'nome_arquivo',
    ];

    public function musica()
    {
    	return $this->belongsTo('App\Musica');
    }
}
